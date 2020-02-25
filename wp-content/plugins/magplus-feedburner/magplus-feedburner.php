<?php
/*
Plugin Name: Magplus feedburner
Plugin URI: http://www.magplus.com
Version: 0.1
Description: Redirect different post-types to different feedburner feeds
Author: Patrik Spathon
Author URI: http://spathon.com
License: GPL

Copyright 2011 Mag+

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class MagplusFeedburnerFeed {
	
	function __construct(){
		
		// Function to redirect all feeds to feedburner
		add_action('template_redirect', array(&$this, 'redirect'));
		
		// The settings page
		add_action('admin_init', array(&$this,'register_admin'));
	}
	
	 
	/*
	* Registers the wp-admin functions
	*/
	function register_admin() {
		
		add_settings_section('magplus_feedburner', __('Feedburner redirects', 'magplus_feedburner'), '__return_false', 'reading');
		
		add_settings_field('magplus_default_feed', __('Default feedburner url', 'magplus_feedburner'), array(&$this, 'default_feed_url'), 'reading', 'magplus_feedburner');
		register_setting('reading','magplus_default_feed');
		
		add_settings_field('magplus_comments_feed', __('Comments feed url','magplus_feedburner'), array(&$this, 'comments_url'), 'reading', 'magplus_feedburner');
		register_setting('reading','magplus_comments_feed');
		
		add_settings_field('magplus_custom_feeds', __('Custom feeds','magplus_feedburner'), array(&$this, 'custom_feeds'), 'reading', 'magplus_feedburner');
		register_setting('reading','magplus_custom_feeds');
	}
	
	/*
	* Functions used by the settings api
	*/
	function admin_section_description() {}
	function default_feed_url() {
		$value = get_option('magplus_default_feed');
		echo '<input type="text" class="regular-text" id="magplus_default_feed" name="magplus_default_feed" value="'. $value .'" />
			<span class="description">'. __('Add the url to the default feedburner url. Example: http://feeds.feedburner.com/magplus/', 'magplus_feedburner') .'</span>';
	}
	function comments_url() {
		$value = get_option('magplus_comments_feed');
		echo '<input type="text" class="regular-text" id="magplus_comments_feed" name="magplus_comments_feed" value="'. $value .'" />
			<span class="description">'. __('The feedburner url for comments. Example: http://feeds.feedburner.com/magplus/', 'magplus_feedburner') .'</span>';
	}
	
	function custom_feeds() {
		$value = get_option('magplus_custom_feeds');
		?>
		<textarea class="widefat" rows="10" id="magplus_custom_feeds" name="magplus_custom_feeds"><?php echo $value; ?></textarea>
		<span class="description"><?php _e('Add the url after feed/ followed by | and then enter the feedburner url. Put every new condition on a new line Example: <br />
			?post_type=press_|_http://feeds.feedburner.com/magplus/press<br />
			If you have a feed for a custom post type AND category put it above the normal post type feed
			?post_type=press&press_cat=in-the-media_|_http://feeds.feedburner.com/magplus/in-the-media', 'magplus_feedburner'); ?>
		</span>
		<?php
	}
	
	
	/**
	 * Redirect to feedburner
	 *
	 *
	 * Redirects the user to the right feedburner feed if is feed
	 */
	function redirect() {
		global $wp_query;
		
		// if not is feed or visitor is feedburner quit
		if (!is_feed() || preg_match("/feedburner|feedvalidator/i", $_SERVER['HTTP_USER_AGENT'])) return;
		
		// Custom feeds
		$custom = get_option('magplus_custom_feeds');
		if(!empty($custom)){
			$rules = explode( PHP_EOL, $custom );
			foreach($rules as $rule){
				if( empty($rule[0]) ) continue;
				$rule = explode('_|_', $rule);
				if(strpos($_SERVER['REQUEST_URI'], $rule[0]) > 0){
					header('Location: '. $rule[1]);
					die();
				}
			}
		}
		
		// Default feed
		$feed = get_option('magplus_default_feed');
		if (($wp_query->is_comment_feed == false) && (trim($feed) != '') && (is_archive() == false)) {
			header('Location: '. $feed);
			die();
		}
		
		// Comments feed
		$feed = get_option('magplus_comments_feed');
		if (($wp_query->is_comment_feed == true) && (trim($feed) != '') && (is_single() == false)) {
			header('Location: '. $feed);
			die();
		}
	}
	
}

// Init the plugin
add_action('plugins_loaded', create_function('','$MPFBF = new MagplusFeedburnerFeed();'));