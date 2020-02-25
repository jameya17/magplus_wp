<?php 
get_header(); 

/*
Template name: Customer Uses Industry Landing
*/

?>



<div id="content" class="content group wrapper subpage-mantle">
	<div class="shadow-wrapper">
<div class="mbox txtheader">
<nav class="sub-nav clearfix breadcrumbs"><a href="/customer-uses">Customer Examples</a> /</nav>		
  <h1> <? the_title(); ?></h1>
  <? echo($post->post_content)?>

</div>  




	<div class="mbox">

			<?php
				global $query_string;


				$type = 'industry_use';
				$args=array(
				  'post_type' => $type,
				  'post_status' => 'publish',
				  'posts_per_page' => -1,
				  'caller_get_posts'=> 1
				);
				$my_query = null;
				$my_query = new WP_Query($args);
			

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
						<a rel="nofollow" href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>">View More »</a>
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
