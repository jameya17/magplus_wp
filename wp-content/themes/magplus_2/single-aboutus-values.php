<?php
/*
Template name: About Us / Values
*/
get_header(); 
the_post();
//$terms = get_the_terms($post->ID, 'use_types');

?>

<div id="content" class="content group wrapper subpage-mantle values">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient msupport ">

   <div  class="mantle" style="background: url('<?php $img=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $img[0] ?>') left bottom no-repeat;">
  <div class="content">
  <h1><?php the_title(); ?></h1>
   <?php the_content(); ?>
</div>
  </div>
</div>  

	<h2 class="subhead"><?php the_field('_alt_page_title'); ?></h2>

	<div class="mbox value-list">
	<?php
	$type = 'mag_values';
	$args=array(
	  'post_type' => $type,
	  'post_status' => 'publish',
	  'posts_per_page' => -1,
	  'caller_get_posts'=> 1
	);
	$my_query = null;
	$my_query = new WP_Query($args);
	//print_r($my_query );
	$count = count($my_query->posts);
	$row=0;

	if( $my_query->have_posts() ) {
	  while ($my_query->have_posts()) : $my_query->the_post(); ?>
	    <div class="mhalf">
	    	<h3><?php the_title(); ?></h3>
	    	<?php  the_content(); ?>
	    </div>
	    <?php
	   		if($row % 2 == 1){
	    ?>
	    </div>
	    <?php if(($row+1)<$count ): ?>
	  	   <div class="mline"></div><div class="mbox<?php echo $floats ?> value-list">
	  	   <?php endif ?>

	    <?php }
	    $row++;
	  endwhile;
	}
	wp_reset_query();  // Restore global post data stomped by the_post().
	?>

 </div>
</div>

<?php get_footer(); ?>