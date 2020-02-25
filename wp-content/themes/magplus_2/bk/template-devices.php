<?php
/*
Template name: Mobile Devices
*/
get_header(); 
the_post();

function getInnerSubstring($string,$delim){
    $string = explode($delim, $string, 3);
    return isset($string[1]) ? $string[1] : '';
}
$str = '<hr />';
$contents = explode($str,get_the_content());
$mantleTxt = $contents[0];
$bodyTxt = $contents[1];
$multiDeviceTxt = $contents[2];

?>

<div id="content" class="content group wrapper subpage-mantle ">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient msupport ">

   <div  class="mantle" style="background: url('<?php $img=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $img[0] ?>') left bottom no-repeat;">
  <div class="content">
  <h1><?php the_title(); ?></h1>
    <p><?= $mantleTxt; ?></p>
</div>
  </div>
</div>  

	<section class="main-copy">
    <h6 class="hidden">Mag+<!--Dont remove this its validate the page w3c--></h6>

		<?= $bodyTxt; ?>
	</section>

	<section>
		<h2 class="center"><?php the_field('_alt_page_title'); ?></h2>
			<div class="makers">
				<?php
				$type = 'devices';
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
					$i=1;
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php if(!get_field('dont_add')){?>
						    <div class="maker maker-<?= $i ?>">
						    	<h3><?php the_title(); ?></h3>
						    	<?php  the_field('overview'); ?>
						    	<?= get_field('device_link') ?>
						    </div>
						    <?php 
						    $i++;
						}
					endwhile;
				}
				wp_reset_query();  // Restore global post data stomped by the_post().
				?>
	 		</div>
 		</section>
		 <section class="multi-device">
			<?=$multiDeviceTxt ?>
		</section>
 
</div>
</div>

<?php get_footer(); ?>