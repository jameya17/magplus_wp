<?php get_header(); ?>

<div id="content" class="content group wrapper">
	 
	<div class="main main-full" role="main">
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
		
			<div class="alignleft big-image">
				<?php the_post_thumbnail('clients-thumb'); ?>
			</div>
		
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				
				<?php
				ps_insert_social_buttons();
				
				custom_tag_text_position( array(
					'id' => $post->ID
				));
				/*
				<div class="social-clients group">
					<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); 
						?>&media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ); 
						?>&description=<?php echo urlencode(get_the_excerpt()); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
				</div>
				 */ ?>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
</div>
<?php get_footer(); ?>