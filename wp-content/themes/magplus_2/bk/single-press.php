<?php get_header(); ?>


<div id="content" class="content group wrapper"> 
	
	<?php //get_sidebar(); ?>
	
	<!--<div class="main main-blog main-one-sidebar" role="main">-->
	<div class="main main-blog" role="main">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h1 class="entry-title">
					<?php the_title(); ?>
					</h1>

					<div class="post-meta">
						<span style="display:none;" class="vcard author post-author author_name"><span class="fn"><?php the_author(); ?></span></span>
						<?php _e(''); ?> <time class="dt-published entry-updated post-date updated" datetime="<? the_date('y-m-d'); ?>"><?php the_time('F d, Y'); ?></time>, <?php _e(''); ?> 
						<?php if ( count( get_the_category() ) ) : ?>
						<span class="cat-links">
							<?php printf( __( '<span class="%1$s"></span> %2$s', 'magplus_theme' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
						</span>
					<?php endif; ?>
						
						
					

						<?php _e(''); ?> <?php the_date(); ?>, 
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