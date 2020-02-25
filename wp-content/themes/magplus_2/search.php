<?php get_header(); ?>


<div id="content" class="content group wrapper"> 
	
	<div class="main main-blog main-one-sidebar" role="main">
		
		<h1>Search: <?php echo $_GET['s']; ?></h1>
		<h2 class="pagetitle">Search Result for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' &mdash; '); echo $count . ' '; _e('articles'); wp_reset_query(); ?></h2>
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
			
				<header class="entry-header search-header">
				
				
				
				
			<div class="vc_row wpb_row vc_row-fluid">
			   <div class="wpb_column vc_column_container vc_col-sm-2">
				  <div class="vc_column-inner ">
					 <div class="wpb_wrapper">
						<div class="wpb_single_image wpb_content_element vc_align_center">
						   <figure class="wpb_wrapper vc_figure">
							  <div class="vc_single_image-wrapper vc_box_shadow_border vc_box_border_grey"><?php the_post_thumbnail(); ?></div>
						   </figure>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="wpb_column vc_column_container vc_col-sm-10">
				  <div class="vc_column-inner ">
					 <div class="wpb_wrapper">
						<div class="wpb_text_column wpb_content_element ">
						   <div class="wpb_wrapper">
							  <h2 class="entry-title blog-title search-title">
									<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a>
							  </h2>
							  <div class="entry-content search-entry">
					<?php 
					//$excerpt = strip_shortcodes(get_the_excerpt());
					//$keys = explode(" ",$s);
					//$excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt);
					//echo $excerpt;
					//the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>"><?php _e('Read more', 'magplus_theme'); ?> &raquo;</a>
					
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
						   </div>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
				
				
				
				
				</header><!-- .entry-header -->
			
				
				
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