<?php get_header(); ?>


<div id="content" class="content group wrapper"> 
	
	<div class="main main-blog main-one-sidebar" role="main">
		
		<h1>Search: <?php echo $_GET['s']; ?></h1>
		<?php
		/*
		
		this site seemed to be down or broken, so commenting it out.

		$url = 'http://api.libris.kb.se/bibspell/spell?query='. urlencode($_GET['s']) .'&key=5503B9A5443C9E6D0657465A3029DE45';
		$content = file_get_contents($url);
		$xml = new SimpleXMLElement($content);
		if(isset($xml->suggestion->term)){
			echo 'Did you mean: ';
			$terms = array();
			foreach($xml->suggestion->term as $term){
				$terms[] = $term;
			}
			$terms = implode(' ', $terms);
			echo '<a href="?s='. urlencode($terms) .'">'. $terms .'</a>';
		}*/
		?>
		
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group search-post'); ?>>
			
				<header class="entry-header">
					<h2 class="entry-title blog-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h2>
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php 
					
					$excerpt = strip_shortcodes(get_the_excerpt());
					$keys = explode(" ",$s);
					$excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt);
					echo $excerpt;
					//the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'magplus_theme'); ?> &raquo;</a>
					
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
			</article><!-- post_class -->
		<?php endwhile; endif; ?>
		
		<div class="clear"></div>
		
		<?php /* Display navigation to next/previous pages when applicable */ 
		
		if(function_exists('wp_pagenavi')){
			wp_pagenavi(); 
		}elseif (  $wp_query->max_num_pages > 1 ){ 
			echo '<div class="post-navigation">';
				posts_nav_link(' &#8212; ', __('&laquo; Nyare inl&auml;gg'), __('&Auml;ldre inl&auml;gg &raquo;'));
			echo '</div>';
		} ?>
		
	</div>

	<?php get_sidebar('blog'); ?>
</div>







<?php get_footer(); ?>