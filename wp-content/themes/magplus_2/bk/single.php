<?php get_header(); ?>

<div id="content" class="content group wrapper"> 
	
	<div class="main main-blog main-one-sidebar" role="main">
	
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
					
					<div class="post-meta h-entry">
						<?php _e('Posted on'); ?> <time class="dt-published" datetime="<? the_date('y-m-d'); ?>"><?=  get_the_date(); ?></time>, <?php _e('by'); ?> 
						<span class="author vcard h-card p-author">
							<?php echo get_the_author(); ?>,
						</span>
						<p></p>
						<span><?php echo the_tags();?></span>
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
				
				<?php ps_insert_social_buttons( array('icons' => false) ); ?>
				
				
				<div class="subscribe-link">
					<a href="/feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="RSS"> Subscribe to our blog</a>
				</div>
									
			</article><!-- post_class -->
		<?php endwhile; endif; ?>
		
		<?php// comments_template( '', true ); ?>
		
		<div id="pingbacks">
			<?php // DisplayPingTrackbacks(); ?>
		</div>
	</div>

	<?php get_sidebar('right'); ?>
</div>




<?php get_footer(); ?>