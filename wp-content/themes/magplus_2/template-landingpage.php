<?php 
/*
Template name: Landingpage
*/
get_header();

the_post();

$meta = get_post_meta($post->ID, '_landing_meta', true);
$title = get_post_meta($post->ID, '_alt_page_title', true);
$title_color = get_post_meta($post->ID, '_alt_page_title_color', true);
?>

<div class="landing-page group" <?php 
	if( !empty($meta['bg']) || !empty($meta['bg_color']) ){ 
		
		
		$bg = '';
		
		// optional settings
		if( !empty($meta['bg_color']) ){
			$bg .= ' '. $meta['bg_color'];
		}
		if( !empty($meta['bg_repeat']) ){
			$bg .= ' '. $meta['bg_repeat'];
		}
		if( !empty($meta['bg_horz']) ){
			$bg .= ' '. $meta['bg_horz'];
		}
		if( !empty($meta['bg_vert']) ){
			$bg .= ' '. $meta['bg_vert'];
		}
		 
		// add a background image
		if(!empty($meta['bg'])){
			if(!is_numeric($meta['bg'])){
				$src = $meta['bg'];
			}else{
				$img = wp_get_attachment_image_src($meta['bg'], 'full');
				$src = $img[0];
			}
			$bg .= ' url('. $src .')';
		}
		
		echo 'style="background: '. $bg .';"'; 
	}
	?>>
	<div class="top-shadow-wrap"><div class="top-shadow"></div></div>
	<div class="wrapper group"> 
		<h1 class="landing-page-title<?php if(!empty($title_color)) echo ' title-color'; ?>"><?php echo do_shortcode($title); ?></h1>
		<div class="landing-page-content entry"><?php the_content(); ?></div>
		<div class="landing-page-img"><?php 
			// display image or video or custom
			if( empty($meta['custom-content']) ){
				the_post_thumbnail('full'); 
			}else{
				echo do_shortcode($meta['custom-content']);
			}
		?></div>
	</div>
</div>

<div class="wrapper"> 
	
	
	<?php
	$sidebars = array();
	if(!empty($meta['order'])){
		$sidebars_tmp = explode(',', $meta['order']);
		foreach($sidebars_tmp as $sidebar){
			$sidebars[] = explode('::', $sidebar);
		}
	}
	$i = 1;
	foreach($sidebars as $s): ?>
		
		<div class="widget-area-horz group landing-widgets landing-cols-<?php echo $s[1]; ?> landing-rows-<?php echo $i; ?>" role="complementary">
			<?php dynamic_sidebar( $s[0] ); ?>
		</div><!-- end <?php echo $s[0]; ?> -->

		
	<?php $i++; endforeach; ?>
	
	<?php /*
	<div class="home-widgets group home-widgets-first" role="complementary">
		<?php dynamic_sidebar( 'left-widget-area' ); ?>
	</div><!-- end home-widgets-first -->
	
	<div class="home-widgets group home-widgets-second" role="complementary">
		<?php dynamic_sidebar( 'right-widget-area' ); ?>
	</div><!-- end .home-widgets-second -->
	
	<div class="home-widgets group home-widgets-third" role="complementary">
		<?php dynamic_sidebar( 'home-widget-area' ); ?>
	</div><!-- end .home-widgets-third -->
	*/ ?>
	
</div>


<?php get_footer(); ?>