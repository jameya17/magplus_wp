<?php get_header(); ?>
<style>
body.blog .brand-page-header-container, body.category .brand-page-header-container {
    color: #fff;
    height: 250px;
}

body.blog .main, body.category .main {
    padding: 0;
    padding-bottom: 30px;
}

body.blog .brand-page-header-container .blog-brand-page-header, body.category .brand-page-header-container .blog-brand-page-header {
    text-align: center;


}
img {
    vertical-align: middle;
}
body.blog .brand-page-header-container h1, body.category .brand-page-header-container h1 {
    color: #fff;
    font-size: 41px;
    font-family: actoultralight,sans-serif;
    margin-bottom: 0;
    text-align: center;
    padding-top: 20px;
    padding-left: 10px;
    padding-right: 10px;
}
body.blog .brand-page-header-container .blog-brand-page-header h2, body.category .brand-page-header-container .blog-brand-page-header h2 {
    color: #fff;
    font-size: 28px;
    line-height: 1.3;
    font-family: actobook,sans-serif;
}
.larger {
    font-size: 14px !important;
}
label.screen-reader-text {
    display: none !important;
}


#searchform #s {
   	background-color: #fff;
	width: 100%;
    margin: 0 0 5px;
    overflow: visible;
    border: 1px solid #372a2a;
    padding: 5px 8px;
    color: #000;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    -ms-box-shadow: none;
    -o-box-shadow: none;
    box-sizing: none;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}



.sidebar-right {
    margin: 0 0 30px 30px;
    padding: 56px 0 0 !important;
}

</style>


<div class="full-width post-thumbnail brand-page-header-container" style="background: url('http://betamagplus.mpstechnologies.com/wp-content/uploads/2011/10/blog-bg.jpg') no-repeat top center; background-size: cover;">
	


<div class="page-header" style="margin-top:0px; margin-bottom: 0;">
	<h1 class="h2">Mag+ BLOG</h1>
</div>
	
		<div class="blog-brand-page-header">
		<h2 class="h4">Updates and news about the app industry<br> and our app-creation tools. 
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
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<h2 class="entry-title blog-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="post-meta">
						<?php _e('Posted on'); ?> <time class="dt-published entry-updated" datetime="<? the_date('y-m-d'); ?>"><?php the_time('F d, Y'); ?></time>, <?php _e('by'); ?> 
						<span class="author vcard">
							<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php 
								echo esc_attr(__( 'View all posts by', 'magplus_theme' ). get_the_author()); ?>"><?php echo get_the_author(); ?></a>
						</span>
						
					</div>
				</header><!-- .entry-header -->
			<?php if ( has_post_thumbnail() ):?>
				<div class="featured-image-wrap"><?php the_post_thumbnail( 'large' ); ?></div>
				<div style="margin-bottom: 40px;"></div>
				<?php endif; ?>
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'magplus_theme'); ?> &raquo;</a>
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
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'magplus_theme' ), __( '1 Comment', 'magplus_theme' ), __( '% Comments', 'magplus_theme' ) ); ?></span>

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
		<div style="margin-bottom: 100px;" ></div>
	</div>

	<?php get_sidebar('blog'); ?>
</div>







<?php get_footer(); ?>