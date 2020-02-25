<?php
/*
Template name: Use Types
*/
get_header(); 
the_post();
$pageSlug = $post->post_name;
$pageTitle= $post->post_title;
$taxonomyID = $post->ID;
//echo('$taxonomyID = '.$taxonomyID );
$terms = get_the_terms($post->ID, 'use_types');

?>
<div id="content" class="content group wrapper subpage-mantle <?=$pageSlug?>">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient msupport">
   <div  class="mantle" style="background: url(<?php the_field('uses_image'); ?>) left bottom no-repeat;">
  <div class="content">
  	<h1><?php the_field('header'); ?></h1>
  	 <?php the_content(); ?>
  	</div>
   </div>

</div>  


	<div class="mbox">
	<?php

	$type = 'uses';
	$args=array(
	  'post_type' => $type,
	  'post_status' => 'publish',
	  'posts_per_page' => -1,
	  'caller_get_posts'=> 1,
	  'meta_query' => array(
        array (
      
        'key' => 'use_type_cat',
        'value' => $taxonomyID,
        'compare' => 'LIKE'
      	)
      )
	);
	$my_query = null;
	$my_query = new WP_Query($args);
	$row=0;
	$floats="";
	$linkSlug = $post->post_name;
	$count = count($my_query->posts);

	if( $my_query->have_posts() ) {

		while ($my_query->have_posts()) : $my_query->the_post(); 

		if($row % 2 == 0){
			$floats=" right";
		}
		else{
			$floats="";
		}
		$pageLink = get_field('link_url');
		$pageLinkTxt = get_field('link');
		$pageLinkTxt =$pageLinkTxt[0];
		if(!$pageLinkTxt){ $pageLinkTxt="View More";}

		$window ="_self";

	

		if($pageLinkTxt && (strpos($pageLink ,'magplus.com') == false) && (strpos($pageLink ,'http') !== false)){
			$window ="_blank";
		}

		$hasImage =  get_field('uses_image');
		if($hasImage ){
			$theClass="mhalf";
		}
		else{
			$theClass ="mfull";
		}
	  ?>
	    <div class="<?php echo $theClass ?> valign">
	    	<div>
	    		<h3><?php the_title(); ?></h3>
	    		<?php get_the_excerpt() ?>
	    		<?php the_content(); ?>
	    		<?php if($pageLink): ?>
	    			<a href="<?php echo $pageLink ?>" target="<?php echo $window ?>" <? if(strpos($pageLinkTxt,'Video') !== false): echo 'class="colorbox-iframe cboxElement"'; endif?> ><?php echo $pageLinkTxt ?> »</a>
	    		<?php endif ?>
	    	</div>
	    </div>
	    <?php if($hasImage ): ?>
	    	<div class="image"><img src="<?php echo $hasImage; ?>" alt="Product"></div>
	    <?php endif ?>
	  	  </div>
	  	   <?php if(($row+1)<$count ): ?>
	  	   <div class="mline"></div><div class="mbox<?php echo $floats ?>">
	  	   <?php endif ?>
	    <?php
	    $row++;
	  endwhile;
	}
	wp_reset_query();  // Restore global post data stomped by the_post().
	?>


 </div>
</div>

<?php get_footer(); ?>