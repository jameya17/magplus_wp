<?php get_header(); ?>


<div id="content" class="content group wrapper">

	<?php //get_sidebar(); ?>

	<div class="main main-press" role="main">

		<h1>Press</h1>

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('group in-the-media-list in-media-'. $i); ?>>


				<h2 class="entry-title">
						<?php the_title(); ?>
				</h2>


				<?php echo strip_tags(get_the_excerpt()); ?>

			</a><!-- post_class -->
		<?php endwhile; endif; ?>


		<?php /* Display navigation to next/previous pages when applicable */

		if(function_exists('wp_pagenavi')){
			wp_pagenavi();
		}elseif (  $wp_query->max_num_pages > 1 ){
			echo '<div class="post-navigation">';
				posts_nav_link(' &#8212; ', __('&laquo; Nyare inl&auml;gg'), __('&Auml;ldre inl&auml;gg &raquo;'));
			echo '</div>';
		} ?>

	</div>
</div>







<?php get_footer(); ?>