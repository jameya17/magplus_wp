<?php get_header(); ?>

<style>

img {
    width: 100%;
    height: auto;
}

.larger {
    font-size: 14px !important;
}

</style>
<div id="content" class="content group wrapper"> 

	<div class="main main-blog main-one-sidebar" role="main">
	
		<header class="page-header">
			<h1 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'magplus_theme' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'magplus_theme' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'magplus_theme' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
				<?php elseif( is_category()): ?>
					<?php printf( __( 'Category Archives: %s', 'magplus_theme' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'magplus_theme' ); ?>
				<?php endif; ?>
			</h1>
		</header>
	
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h2 class="entry-title">

						<?php if ( has_post_thumbnail() ):?>
				<div class="featured-image-wrap"><?php the_post_thumbnail( 'large' ); ?></div>
				<div style="margin-bottom: 40px;"></div>
				<?php endif; ?>


									<div class="post-meta h-entry">
									<span  style="display:none;" class="updated"> '.$updated_time.'</span>
						<?php _e(''); ?> <time class="dt-published" datetime="<? the_date('y-m-d'); ?>"><?=  get_the_date(); ?></time>, <?php _e(''); ?> 
						<span class="author vcard h-card p-author">
							<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php 
								echo esc_attr(__( 'View all posts by', 'magplus_theme' ). get_the_author()); ?>"><?php // echo get_the_author(); ?></a>
						</span>
<?php if ( count( get_the_category() ) ) : ?>
						<span class="cat-links">
							<?php printf( __( '<span class="%1$s"> </span> %2$s', 'magplus_theme' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
						</span>
						<span class="meta-sep"></span>
					<?php endif; ?>
					</div>




						<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
					
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
				<div class="post-footer">
					
					<?php
						$tags_list = get_the_tag_list( '', ', ' );
						if ( $tags_list ):
					?>
						<span class="tag-links">
							<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'magplus_theme' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
						</span>
						<span class="meta-sep">|</span>
					<?php endif; ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'magplus_theme' ), __( '1 Comment', 'magplus_theme' ), __( '% Comments', 'magplus_theme' ) ); ?></span>

				</div>
				
			</article><!-- post_class -->
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

	<?php get_sidebar('blog'); ?>
</div>







<?php get_footer(); ?>