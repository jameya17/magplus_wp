<?php get_header(); ?>


<div id="content" class="content group wrapper support-info"> 
	
	<div class="main main-blog main-one-sidebar" role="main">
	
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
					
					<div class="post-meta">
						<?php _e('Posted on'); ?> <?php the_date(); ?>
						<span class="tag-text">
							<?php 
							custom_tag_text_position( array(
								'id' => $post->ID,
								'prefix' => ' | ',
								'pos' => 1
							));
							?>
						</span>
					</div>
					

					
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_content(); ?>
					
					
					<?php
					custom_tag_text_position( array(
						'id' => $post->ID,
						'prefix' => '<p>',
						'suffix' => '</p>',
						'pos' => 2
					));
					?>
					
					
					
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
			
				
				<div class="subscribe-link">
					<a href="/feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="RSS"> Subscribe to our blog</a>
				</div>
									
			</article><!-- post_class -->
		<?php endwhile; endif; ?>
		
		
		
		<div id="pingbacks">
			<?php DisplayPingTrackbacks(); ?>
		</div>
	</div>

	<?php get_sidebar('support-info'); ?>
</div>




<?php get_footer(); ?>