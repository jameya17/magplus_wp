<?php
/*
Template name: Image archive
*/
get_header(); ?>

<div id="content" class="content group wrapper">

	<?php get_sidebar('left'); ?>

	<div class="main" role="main">
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php //the_content(); ?>


				<div class="img-archive">


					<?php
					$args = array(
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'post_parent' => $post->ID,
						'numberposts' => 600,
						'orderby' => 'date',
						'order' => 'DESC',
					);
					$images = get_posts( $args );
					$i = 1;
					if(is_array($images) && !empty($images[0])): foreach($images as $image):
						#echo '<pre>'; print_r($image); echo '</pre>';
						$org = wp_get_attachment_image_src($image->ID, 'full'); // The img
						$small = wp_get_attachment_image_src($image->ID, 'thumbnail'); // The img
						//$large = wp_get_attachment_image_src($image->ID, 'large'); // The img
						?>

						<div class="img-single">
							<a href="<?php echo $org[0]; ?>" rel="img-archive">
								<img src="<?php echo $small[0]; ?>" alt="<?php echo esc_attr($image->post_title); ?>" />
							</a>
							<br />
							<a href="<?php echo $org[0]; ?>" class="img-archive-download"><?php _e('Download fullsize', 'magplus_theme'); ?></a>
						</div>

						<?php if (($i % 4) == 0) echo '<div class="clear"></div>'; ?>

					<?php $i++; endforeach; endif; ?>
				</div>

				<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
</div>
<?php get_footer(); ?>