<?php

/**
 * 
 * Create custom post type
 * 
 */

class SpathonCustomPostWidget extends WP_Widget { 
	
	/**
	 * Start the plugin
	 * @return 
	 */
	function SpathonCustomPostWidget() {
		$widget_ops = array('classname' => 'mag-recent-posts', 'description' => __('Recent post types', 'mag_gen_lang') );
		$this->WP_Widget('mag_recent_posts', __('Recent post types', 'mag_gen_lang'), $widget_ops);
	}
	
	/**
	 * The Output of the plugin
	 * 
	 * 
	 * @return 
	 * @param object $args
	 * @param object $instance
	 */
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		global $post; 
		
		#echo '<pre>'; print_r($args); echo '</pre>';
		
		
		// echo the widget
		echo $before_widget;
			echo $before_title . $instance['title'] . $after_title;
			
			echo '<ul>';
				$args = array(
					'post_type' => $instance['post_type'],
					'posts_per_page' => $instance['posts_per_page']
				);		
				$q = new WP_Query($args);
				if($q->have_posts()): while($q->have_posts()): $q->the_post(); ?> 
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<?php 
						#if($instance['post_type'] == 'post'){
							// add time ago on posts
							#echo '('. human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago)';
						#}elseif($instance['post_type'] == 'press'){
							
							// if have media set
						#	$media = get_post_meta($post->ID, '_press_media', true);
						#	if(!empty($media)) echo '('. $media .')';
						#}
						?>
					</li>
				<?php endwhile; endif; wp_reset_postdata(); 
			echo '</ul>';
			
			$pfp = get_option('page_for_posts');
			echo '<a href="'. get_permalink($pfp) .'" title="'. __('See all blog posts') .'">See all &raquo;</a>'; 
			
			
		echo $after_widget;
		
	}

	
	
	
	
	/**
	 * Uppdate the settings on save
	 * 
	 * @return 
	 * @param object $new_instance
	 * @param object $old_instance
	 */
	
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
				
		$instance['post_type'] = mysql_real_escape_string($new_instance['post_type']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posts_per_page'] = preg_replace("/\D/","", $new_instance['posts_per_page']);
		
		return $instance;
	}
	

	
	
	
	/**
	 * The Widget settings
	 * 
	 * @return 
	 * @param object $instance
	 */
	function form($instance) {
		// These are our default values
        $defaults = array( 
        	'post_type' => '',
        	'title' => '',
        	'posts_per_page' => 5
        );
		
        // This overwrites any default values with saved values
        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mag_gen_lang'); ?></label>
            <input type="text" value="<?php echo $instance['title']; ?>" id="<?php echo $this->get_field_id('title'); 
            	?>"class="widefat spathon-select-post-type" name="<?php echo $this->get_field_name('title'); ?>">
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post type:', 'mag_gen_lang'); ?></label>
            <select id="<?php echo $this->get_field_id('post_type'); ?>"class="widefat spathon-select-post-type" name="<?php echo $this->get_field_name('post_type'); ?>">
				<?php
				$post_types = get_post_types(array('publicly_queryable' => true));
				foreach($post_types as $type): ?>
					<option <?php selected($instance['post_type'], $type);
						?>><?php echo $type; ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		
		
        <p>
            <label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Number to show:', 'mag_gen_lang'); ?></label>
            <input type="number" value="<?php echo $instance['posts_per_page']; ?>" id="<?php echo $this->get_field_id('posts_per_page'); 
            	?>"class="widefat spathon-select-post-type" name="<?php echo $this->get_field_name('posts_per_page'); ?>">
		</p>
		
		
        <?php
	}
}




add_action('widgets_init', create_function('', 'return register_widget("SpathonCustomPostWidget");'));