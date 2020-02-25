<?php get_header(); ?>


<div id="content" class="content group wrapper"> 
	
	<div class="main main-blog main-one-sidebar" role="main">
		
		<?php 
		if(is_home()){

			echo '<h1>Blog</h1>';
		}
		?>

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h2 class="entry-title blog-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="post-meta">
						<?php _e('Posted on'); ?> <time class="dt-published entry-updated" datetime="<? the_date('y-m-d'); ?>"><?php the_time('F d, Y'); ?></time><?php /*, <?php _e('by'); ?> 
						<span class="author vcard">
							<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php 
								echo esc_attr(__( 'View all posts by', 'magplus_theme' ). get_the_author()); ?>"><?php echo get_the_author(); ?></a>
						</span>
						*/ ?>
					</div>
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'magplus_theme'); ?> &raquo;</a>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
				<div class="post-footer">
				<?php /*
					<?php if ( count( get_the_category() ) ) : ?>
						<span class="cat-links">
							<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'magplus_theme' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
						</span>
						<span class="meta-sep">|</span>
					<?php endif; ?>
					<?php
						$tags_list = get_the_tag_list( '', ', ' );
						if ( $tags_list ):
					?>
						<span class="tag-links">
							<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'magplus_theme' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
						</span>
						<span class="meta-sep">|</span>
					<?php endif; ?>*/ ?>
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