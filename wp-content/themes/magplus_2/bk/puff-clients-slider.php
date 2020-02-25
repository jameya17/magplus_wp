<?php
/*
Puff template: Client slider
*/

$args = array(
	'post_type' => 'magslide',
	'posts_per_page' => 13,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'magslide_pos',
			'field' => 'id',
			'terms' => array(199)
		)
	)
);

$q = new WP_Query($args);?>

<div class="client-slide-puff">
	<h3 class="widget-title"><?php if(is_tag()){echo 'Great apps created with Mag+ ';}else{ the_title(); } ?></h3>
		<div class="client-slide-wrap">
			<div id="client_slide">
				<?php if($q->have_posts()): while($q->have_posts()): $q->the_post();
					// Link
					$link = $post->post_excerpt;
					$img = array();
					
					if(empty($link)){
					$args = array(
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'post_parent' => $post->ID,
						'numberposts' => 100,
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'exclude' => get_post_thumbnail_id($post->ID)
					);
					$images = get_posts( $args );
					if(is_array($images) && !empty($images[0])){
						foreach($images as $image){
							$org = wp_get_attachment_image_src($image->ID, 'full'); // The img
							if(!$link){ 
								$link = '<a href="'. $org[0] .'" class="colorbox" rel="client-'. $post->ID .'">';
							}else{
								$img[] = '<a href="'. $org[0] .'" class="colorbox" rel="client-'. $post->ID .'">&nbsp;</a>'; 
							}
						}
					}else{
						$link = false;
					}
				}else{
					$link = '<a href="'. $link .'?controls=1&&showinfo=0&modestbranding=1&autoplay=1&autohide=1" class="colorbox-iframe" rel="nofollow">';
				}
				
				$device = 'ipad';
				if(has_term('iphone', 'devices')) $device = 'iphone';
				if(has_term('Android smartphone', 'devices')) $device = 'android-smartphone';
				if(has_term('Android tablet', 'devices')) $device = 'android-tablet';
				if(has_term('Kindle fire', 'devices')) $device = 'kindlefire';
				$num = rand(0, 3); ?>
				<div class="client-slide-item <?php echo $device; ?>-img">
					<div class="client-slide-img">
					<?php echo $link; ?>
						<?php the_post_thumbnail(); ?>
					<?php if($link) echo '</a>'; ?>
				</div>
					<?php #the_title(); ?>
					<div class="hidden">
						<?php echo join("\n", $img); ?>
					</div>
				</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	<div id="prev">Prev</div>
	<div id="next">Next</div>

	<?php
	wp_register_script('puff-slider-carousel-settings', get_template_directory_uri().'/js/puff-slider-carousel-settings.js', array('jquery', 'carouFredSel'), false, true);
	wp_enqueue_script( 'puff-slider-carousel-settings' );
	?>
	
</div>