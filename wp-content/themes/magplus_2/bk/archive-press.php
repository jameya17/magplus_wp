<?php get_header(); ?>

<style>
div#subNav {
    display: none;
}

.larger {
    font-size: 14px;
}
</style>
<div id="content" class="content group wrapper">

	<?php// get_sidebar(); ?>

	<div class="main main-press" role="main">

		<h1>Press</h1>

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<span style="display:none;" class="vcard author author_name"><span class="fn"><?php the_author(); ?></span></span>
		<span  style="display:none;" class="updated"> '.$updated_time.'</span>
			<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('group in-the-media-list in-media-'. $i); ?>>

				<span style="display:none;"  class="post-date updated"><?php the_date(); ?></span>
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



<div style="margin-bottom: 200px;" ></div>



<?php get_footer(); ?>