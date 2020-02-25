<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
		<!-- Custom messages if you've done something on the previous page -->
		
		<?php custom_message(); ?>
	
		<header class="entry-header">
			<?php $alt_title = get_post_meta($post->ID, '_alt_page_title', true); ?>
			<h1 class="entry-title"><?php if($alt_title) echo $alt_title; else the_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; // end of the loop. ?>