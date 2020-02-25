<?php

/**
 * 
 * Create custom post type
 * 
 */

function press_quotes_shortcode($atts) {
     extract(shortcode_atts(array(
	      'before' => '<div class="press-quote-wrap">',
	      'after' => '</div>',
	      'quote_ids' => ''
     ), $atts));
     
     $opts = array(
     	'selected_media' => $quote_ids
     );
          
     $out = $before;
	     $out .= ps_list_quotes($opts);
     $out .= $after;
     
     return $out;
}
add_shortcode('press_quotes', 'press_quotes_shortcode');

function ps_list_quotes($instance){

	$out = '';
	
	$out .= '<div class="press_widget">';
		$args = array(
			'post_type' => 'press',
			'orderby' => 'rand',
			'posts_per_page' => 1,
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => '_press_quote'
				),
				array(
					'key' => '_press_activate'
				)
			)
		);		
		$q = new WP_Query($args);
		$i = 0;
		if($q->have_posts()): while($q->have_posts()): $q->the_post();
			$meta = get_post_custom();
			
			$out .= '<span class="press-widget-quote" ';
			$out .= (strlen($meta['_press_quote'][0]) > 50) ? 'style="display: block;">' : '>';
				$out .= '<span class="press-the-quote">
						“'. $meta['_press_quote'][0] .'”
					</span>
					<span class="press-widget-by">';
						if(!empty($meta['_press_quote_by'][0])){
							$out .= '- '. $meta['_press_quote_by'][0] .', ';
						 }
						$out .= '<a href="'. $meta['_press_url'][0] .'"> 
							'. $meta['_press_media'][0] .'
						</a>
					</span>

			</span>
		
		<div class="press-loggos">';
		endwhile; endif; wp_reset_postdata(); 
			
			if(!empty($instance['selected_media'])):
				
				// get all selected media
				$media = explode(',', $instance['selected_media']);
				
				foreach($media as $m): 
					
					$press_logo = get_post($m);
					
					// $meta = get_post_custom($m); // $meta['_press_url'][0]
					
					$out .= '<span class="press-widget-link">
							'. get_the_post_thumbnail( $m, 'full' ) .'
					</span>'; 
				endforeach;
			endif;
			
			$out .= '<a href="'. /*get_post_type_archive_link('press')*/ get_permalink(37) .'">See all news &raquo;</a>';
	$out .= '</div></div>';
	
	return $out;
}






class PressQuoteWidget extends WP_Widget { 
	
	/**
	 * Start the plugin
	 * @return 
	 */
	function PressQuoteWidget() {
		$widget_ops = array('classname' => 'mag-press-quotes', 'description' => __('Show quote and press links', 'mag_gen_lang') );
		$this->WP_Widget('mag_press_quote', __('Press quotes', 'mag_gen_lang'), $widget_ops);
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
		
		#$out .= '<pre>'; print_r($args); $out .= '</pre>';
		echo $before_widget;
			echo ps_list_quotes($instance);
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
				
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['selected_media'] = strip_tags($new_instance['selected_media']);
		
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
        	'selected_media' => ''
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
            <label for="<?php echo $this->get_field_id('selected_media'); ?>"><?php _e('Selected media:', 'mag_gen_lang'); ?></label>
            <input type="text" value="<?php echo $instance['selected_media']; ?>" id="<?php echo $this->get_field_id('selected_media'); 
            	?>"class="widefat spathon-select-post-type" name="<?php echo $this->get_field_name('selected_media'); ?>">
		</p>		
        <?php
	}
}




add_action('widgets_init', create_function('', 'return register_widget("PressQuoteWidget");'));