<?php
/*
Template name: App Store Publishing
*/
get_header(); 
the_post();

$str = '<hr />';
$contents = explode($str,get_the_content());
$mantleTxt = $contents[0];
$bodyTxt = $contents[1];

?>

<div id="content" class="content group wrapper subpage-mantle">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient msupport ">

   <div  class="mantle" style="background: url('<?php $img=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $img[0] ?>') left bottom no-repeat;">
  <div class="content">
  <h1><?php the_title(); ?></h1>
   <?= $mantleTxt; ?>
</div>
  </div>
</div>  
	<div class="mbox no-marg">
		<?= $bodyTxt; ?>
	</div>
	<div class="platforms">
		<div class="mbox">
		<?php
		$type = 'app_publishing';
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
		  while ($my_query->have_posts()) : $my_query->the_post();?>
			    <div class="mhalf <?= $post->post_name ?>">
			    	<h3 style="background-image: url('<?php the_field('platform_img'); ?>')"><?php the_title(); ?></h3>
			    	<?php  the_field('platform_descr'); ?>
			    	<a href="<?php the_permalink(); ?>" >View More »</a>
			
			    </div>
			    <?php
			   		if($row % 2 == 1){
			    ?>
			    </div>
			    <?php if(($row+1)<$count ): ?>
			  	   <div class="mline"></div><div class="mbox<?php echo $floats ?>">
			  	   <?php endif ?>

			    <?php }
			    $row++;
			    //print_r($my_query->have_posts());
		  endwhile;
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
		?>

	 </div>
 </div>
</div>
<script>
$(document).ready(function () {
	$('.shadow-wrapper').append($('.multiplatform'));
});
</script>
<?php get_footer(); ?>