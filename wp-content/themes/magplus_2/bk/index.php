<?php get_header(); ?>


<div class="full-width post-thumbnail brand-page-header-container" style="background: url('https://d3qvq3btfltx1c.cloudfront.net/wp-content/uploads/2011/10/20022835/blog-bg-1-1-1.jpg') no-repeat top center; background-size: cover;">
	


<div class="page-header" style="margin-top:0px; margin-bottom: 0;">
	<h1 class="h2">mag+ BLOG</h1>
</div>
	
		<div class="blog-brand-page-header">
		<h2 class="h4">Updates and news about the app industry<br> and our app-creation tools. </h2>

	</div>
	
</div>
<div id="content" class="content group wrapper"> 
	
	<div class="main main-blog main-one-sidebar" role="main">
		
		<?php 
		if(is_home()){

			echo '<h1>&nbsp;</h1>';
		}
		?>

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		
		 <h2 class="entry-title blog-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
			<div class="post-meta">
						<span style="display:none;" class="vcard author author_name"><span class="fn"><?php the_author(); ?></span></span>
						<?php _e(''); ?> <time class="dt-published entry-updated" datetime="<? the_date('y-m-d'); ?>"><?php the_time('F d, Y'); ?></time>, <?php _e(''); ?> 
						<?php if ( count( get_the_category() ) ) : ?>
						<span class="cat-links">
							<?php printf( __( '<span class="%1$s"></span> %2$s', 'magplus_theme' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
						</span><span><?php echo the_tags();?></span>
					<?php endif; ?>
						
						
				</div>
					
					
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
			
			 
					
				<header class="entry-header">
				<?php if ( has_post_thumbnail() ):?>
				<div class="featured-image-wrap"><?php the_post_thumbnail( 'large' ); ?></div>
				<div style="margin-bottom: 40px;"></div>
				<?php endif; ?>
				
					
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>"><?php _e('READ MORE', 'magplus_theme'); ?> &raquo;</a>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
				<div class="post-footer">
				
					

				</div>
				
			</article><!-- post_class -->
		<?php endwhile; endif; ?>
		
		
		<?php /* Display navigation to next/previous pages when applicable */ 
		
		if(function_exists('wp_pagenavi')){
			wp_pagenavi(); 
		}elseif (  $wp_query->max_num_pages > 0 ){ 
			echo '<div class="post-navigation">';
				posts_nav_link(' &#8212; ', __('&laquo; Nyare inl&auml;gg'), __('&Auml;ldre inl&auml;gg &raquo;'));
			echo '</div>';
		} ?>
			</div>

	<?php get_sidebar('blog'); ?>
</div>







<?php get_footer(); ?>