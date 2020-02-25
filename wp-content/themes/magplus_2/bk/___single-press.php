<?php get_header(); ?>


<div id="content" class="content group wrapper"> 
	
	<?php // get_sidebar(); ?>
	
	<div class="main main-blog main-one-sidebar" role="main">
	
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h1 class="entry-title">
					<?php the_title(); ?>
					</h1>

					<div class="post-meta">

						<?php _e('Posted on'); ?> <?php the_date(); ?>, <?php _e('by'); ?> 
						<span class="author vcard">
							<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php 
								echo esc_attr(__( 'View all posts by', 'magplus_theme' ). get_the_author()); ?>"><?php echo get_the_author(); ?></a>
						</span>
						<span class="tag-text">
						<?php 
						custom_tag_text_position( array(
							'id' => $post->ID,
							'pos' => 1,
							'prefix' => ' | ',
							'text' => 'Posted in our [mag_tag] series'
						));
						?>
						</span>
					</div>
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_content(); 
						
						custom_tag_text_position( array(
							'id' => $post->ID,
							'pos' => 2,
							'prefix' => '<p>',
							'suffix' => '</p>'
						));
						
					?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
				
				<?php ps_insert_social_buttons( array('icons' => false) ); ?>
				
				
			</article><!-- post_class -->
		<?php endwhile; endif; ?>
		
		<?php #comments_template( '', true ); ?>
		
	</div>
</div>



<?php get_footer(); ?>