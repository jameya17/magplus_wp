<?php get_header(); ?>

<?php


$tag_id = get_query_var('tag_id');

// Mini title
$tag_content= get_tag($tag_id);
$custom_title = $tag_content->name;
$tag_descr = $tag_content->description;

if($custom_title ==""){
	$custom_title = $tag_content->name;
}

$custom_descr= get_metadata('post_tag', $tag_id, 'tag_custom_title', true);

if(empty($custom_descr)){
	$custom_descr = ps_settings('tag-default-title', false);
}
// Light dark
$light_dark = ps_settings('tag_ld', false);
$current_ld = get_metadata('post_tag', $tag_id, 'tag_style', true);
if(isset($current_ld['ld'])) $light_dark = $current_ld['ld'];
$dark = ($light_dark == 'dark') ? true : false;
// background image


$tag_img = ps_settings('tag-image', false);

?>



<div id="content" class="content group wrapper subpage-mantle">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient msupport ">

   <div  class="mantle" style="padding:0;background: url('<?php echo get_template_directory_uri(); ?>/images/mantle-bg-blog-landing.png') left bottom no-repeat;">
  <div class="content">
  <h1><?= $custom_title ?></h1>
   <p><?= strip_tags ( $custom_descr)  ?></p>
</div>
  </div>
</div>  
	<? if($tag_descr){ echo '<div class="mbox"><p.p1>'.$tag_content->description.'</p></div>';} ?>
	<h2 class="subhead">Related Articles</h2>

	<div class="mbox">

			<?php
				global $query_string;
				$count = -1;
				$my_query = new WP_Query($query_string.'&posts_per_page='.$count.'&post_type=any');

				$postsfound =  $my_query->found_posts;

				//echo $postsfound;

				//$count =min($count,$postsfound);
				$count =$postsfound;

				$row=0;
				if($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post(); ?>
			<?php 
			$thetitle= get_the_title();
			$slength = strlen($thetitle);

			//get first 20 characters
			$slicetitle[0]=  substr($thetitle, 0, 20);
			//get remaining string
			$slicetitle[1]=  substr($thetitle, 20, $slength);

			//split after first space
			$thetitleSpace = explode(" ",$slicetitle[1],2);

			//make sure there is a second line
			if($thetitleSpace[1]){
			$thetitleSpace[1] = " <span> ".$thetitleSpace[1]."</span>";
			}
			else{
				$thetitleSpace[1]="";
			}

			//put 'er all together
			$thetitle= $slicetitle[0].$thetitleSpace[0].$thetitleSpace[1];
			//$thetitle = $slicetitle[1];
		

				?>
					 <div class="mhalf">
						
			    		<h3><?= $thetitle; ?></h3>	
			    		<?php the_excerpt(); ?>		
						<a rel="nofollow" href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>">Read More &raquo;</a>
					</div>
						

					<?php if($row % 2 == 1){?>

				    </div>
				    <?//('close odd row  true='. (($row+1)<$count))." end true";?>
				    <?php 
				    if(($row+1)<$count): ?>
				    <?//'add row'.'row='.$row ?>
				  	   <div class="mline"></div><div class="mbox<?php echo $floats ?>">
					
				  	    <?endif ?>

				    <?php }
	    $row++;
		endwhile; endif;
		if($count% 2 == 1){
		//	echo  'add close';
		echo  '</div>';

	} ?>
	

</div>
<?php get_footer(); ?>
