<?php get_header(); ?>

<div id="content" class="content group wrapper">
	
	<div class="main main-one-sidebar" role="main">
		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
		<h1><?php echo $term->name; ?></h1>
		<?php if(!empty($term->description)): ?>
			<p><?php echo $term->description; ?></p>
		<?php endif; ?>
		
		<?php
		$i = 1;
		
		if(strtolower($term->name) == 'tutorials') {
			global $query_string;
			query_posts( $query_string . '&order=ASC' );
		}
		
		if(have_posts()): while(have_posts()): the_post(); 
			$thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
			$oddEven = ($i % 2 == 0) ? 'even' : 'odd'; ?>
			<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('group cat-video video-'. $oddEven); ?>>
				<img class="cat-video-img" src="<?php echo $thumb; ?>" alt="video thumbnail" />
				<h2><?php the_title(); ?></h2>
				<span><?php the_excerpt(); ?></span>
			</a><!-- post_class -->
		<?php $i++; endwhile; endif; #wp_reset_query(); ?>
		
		<?php /* Display navigation to next/previous pages when applicable */ 
		if(function_exists('wp_pagenavi')){
			wp_pagenavi(); 
		}elseif (  $wp_query->max_num_pages > 1 ){ 
			echo '<div class="post-navigation">';
				posts_nav_link(' &#8212; ', __('&laquo; Nyare inl&auml;gg'), __('&Auml;ldre inl&auml;gg &raquo;'));
			echo '</div>';
		} ?>
		
	</div>	
	<?php get_sidebar('video'); ?>
	
	
</div>
<?php get_footer(); ?>