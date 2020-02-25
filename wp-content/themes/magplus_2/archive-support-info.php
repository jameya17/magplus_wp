<?php get_header(); ?>

<div id="content" class="content group wrapper support-info-archive"> 

	<div class="main main-blog main-one-sidebar" role="main">
		<header class="page-header">
			<h1 class="page-title">
				Support Info
			</h1>
		</header>
	
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="post-meta">
						<?php _e('Posted on'); ?> <?php the_date(); ?>
					</div>
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
				<div class="post-footer">
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
					<?php endif; ?>
					
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

	<?php get_sidebar('support-info'); ?>
</div>







<?php get_footer(); ?>