<?php

/**
 * 
 * Create custom post type
 * 
 */

class MagSocialMediaWidget extends WP_Widget {
	
	/**
	 * Start the plugin
	 * @return 
	 */
	function MagSocialMediaWidget() {
		$widget_ops = array('classname' => 'mag-social-media', 'description' => __('A social media widget', 'mag_gen_lang') );
		$this->WP_Widget('mag_social_media', __('Social media mag+', 'mag_gen_lang'), $widget_ops);
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
		
		#echo '<pre>'; print_r($args); echo '</pre>';
		
		
		// echo the widget
		echo $before_widget;
			echo $before_title . $instance['title'] . $after_title;
			
			echo 'Social media';
			
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
        	'title' => '',
        	'facebook' => ''
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
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'mag_gen_lang'); ?></label>
            <input type="text" value="<?php echo $instance['facebook']; ?>" id="<?php echo $this->get_field_id('facebook'); 
            	?>"class="widefat spathon-select-post-type" name="<?php echo $this->get_field_name('facebook'); ?>">
		</p>
		
        <?php
	}
}




add_action('widgets_init', create_function('', 'return register_widget("MagSocialMediaWidget");'));