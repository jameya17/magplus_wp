<?php

/**
 * MAG+ THEME SETTINGS
 *
 * - Login
 * - require
 * - Theme setup
 * - include javascript
 */

/**********   require   **********/
require_once(TEMPLATEPATH .'/admin/admin-functions.php'); // Admin
require_once(TEMPLATEPATH .'/logged-in/functions.php'); // loggin functions

$inc_path = TEMPLATEPATH .'/inc/';
$meta_path = $inc_path .'/metaboxes/';
require_once($inc_path. 'sidebars.php');
require_once($inc_path. 'signup.php');
require_once($inc_path. 'posttypes.php');
require_once($inc_path. 'manual.php'); // the documentation about classes and other theme related things
require_once($inc_path. 'theme-functions.php');// theme functions
require_once(TEMPLATEPATH. '/settings/panel.php'); // theme settings
require_once($inc_path. 'track_referral.php');

// meta
require_once($meta_path .'video-meta-boxes.php'); // Video
require_once($meta_path .'post-meta-boxes.php'); // Post

if(is_admin()){
	require_once($meta_path .'page-app-marketing.php'); // Page
	require_once($meta_path .'events-meta-boxes.php'); // Events
	require_once($meta_path .'pricing-meta-boxes.php'); // Press
	require_once($meta_path .'press-meta-boxes.php'); // Press
	require_once($meta_path .'page-meta-boxes.php'); // Page
	require_once($meta_path .'events-meta-boxes.php'); // Events
	require_once($meta_path .'landingpage-meta.php'); // Landingpage relevant meta
	require_once($meta_path .'slideshow-meta-boxes.php'); // slideshow
	require_once($meta_path .'page-what-is-magplus.php'); // What is Mag+
}


add_action('init', 'add_tags_to_post_types');
function add_tags_to_post_types(){
	register_taxonomy_for_object_type('post_tag', 'clients');
	register_taxonomy_for_object_type('post_tag', 'page');
	register_taxonomy_for_object_type('post_tag', 'video');
	register_taxonomy_for_object_type('post_tag', 'press');
}

















/*============================================================================================
				  Browser detect : used to define 'brwsr' js var for expand_box.js
============================================================================================*/

/*======================================================
				  HTML Minifyer
======================================================*/




?>