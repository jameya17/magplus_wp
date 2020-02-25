<?php
/*
Template name: Uses
*/
get_header(); 
the_post();
$terms = get_the_terms($post->ID, 'use_types');

?>

<div id="content" class="content group wrapper subpage-mantle">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient msupport ">

   <div  class="mantle" style="background: url('<?php $img=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $img[0] ?>') left bottom no-repeat;">
	<div class="content">
		<h1><?php the_field('mantle_headline'); ?></h1>
		<p><?php the_field('mantle_text'); ?></p>
	</div>
  </div>
</div>  

	<section class="main-copy">
	 <?php the_content(); ?>
 </section>

</div>

<?php get_footer(); ?>