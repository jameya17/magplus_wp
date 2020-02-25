<?php get_header(); ?>

<div id="content" class="content group wrapper">
	
	<div class="main main-one-sidebar" role="main">
		<?php		
		
		// Featured image
		$id = get_ps_settings('featured-video');
		if( !empty($id) ){
			$featured_video = get_post($id);
		}else{
			$args = array(
				'post_type' => 'video',
				'numberposts' => 1
			);
			$featured_video = get_posts($args);
			$featured_video = $featured_video[0];
		}
		
		$video_id = get_post_meta($featured_video->ID, '_mag_video_id', true);
		$service = get_post_meta($featured_video->ID, '_mag_video_service', true);
		
		if($service == 'vimeo'){
			$video = 'https://player.vimeo.com/video/'. $video_id .'?title=0&amp;byline=0&amp;portrait=0';
		}elseif($service == 'youtube'){
			$video = 'https://www.youtube.com/embed/'. $video_id .'?rel=0';
		}
		?>
		<article id="post-<?php echo $featured_video->ID; ?>" <?php post_class('group video-big', $featured_video->ID); ?>>
			<iframe style="margin: 0 0 15px" src="<?php echo $video; ?>" width="720" height="396"></iframe>
			<h2>
				<a href="<?php echo get_permalink($featured_video->ID); ?>"><?php echo $featured_video->post_title; ?></a>
			</h2>
			<div class="">
				<?php echo apply_filters('the_content', $featured_video->post_content); ?>
			</div>
		</article><!-- post_class -->
		
		<?php
		$i = 1;
		$terms = get_terms("video_cat","orderby=custom_sort&order=ASC");
		foreach( $terms as $term):
		
			$args = array(
				'post_type' => 'video',
				'posts_per_page' => 5,
				'tax_query' => array(
					array(
						'taxonomy' => 'video_cat',
						'fields' => 'id',
						'terms' => $term->term_id
					)
				)
			);
			
			echo '<h3><a href="'. get_term_link($term->slug, 'video_cat') .'">'. $term->name .'</a></h3>';
			
			$i = 1;
			$q = new WP_Query($args);
			if($q->have_posts()): 
			echo '<a href="'. get_term_link($term->slug, 'video_cat'). '" class="playlist-wrap">';
			while($q->have_posts()): $q->the_post();
				
				$thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
				// if the img would be missing
				if(empty($thumb) 
					&& $id = get_post_meta($post->ID, '_mag_video_id', true) ){
					$v = json_decode(file_get_contents('https://gdata.youtube.com/feeds/api/videos/'. $id .'?v=2&alt=jsonc&prettyprint=true&key=AI39si5wi2WRgD8Mw2AGELq78l2vch7wZUu0s7u-iJWz-y-oM34whIQAXcZrO4miNv6XsGFPQ6cuhoS1F76NEF_7VofhVYshzw'));
					$thumb = (isset($v->data->thumbnail->hqDefault)) ? $v->data->thumbnail->hqDefault : false;
					if($thumb){
						update_post_meta($post->ID, '_mag_video_thumbnail', $thumb);
					}
				}

				if (strpos($thumb,'http://') !== false) {
				   $thumb = str_replace("http://","https://",$thumb);
				}
				$oddEven = ($i % 5 == 0) ? 'last' : 'others'; ?>
				<span <?php post_class('group alignleft video-small video-'. $oddEven); ?>>
					<img  src="<?php echo $thumb; ?>" alt="<?php the_title_attribute(); ?>" /><br />
				</span><!-- post_class -->
			<?php $i++; endwhile; echo '</a>'; endif; wp_reset_postdata(); ?>
			
			
		<?php endforeach; ?>
	</div>
	
	<?php get_sidebar('video'); ?>
	
</div>
<?php get_footer(); ?>