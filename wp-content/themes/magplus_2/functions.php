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



add_action( 'init', 'my_script_enqueuer' );

function my_script_enqueuer() {
   wp_register_script( "my_voter_script", '/form.js', array('jquery') );
   wp_localize_script( 'my_voter_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'my_voter_script' );

}

add_action("wp_ajax_generate_case_studies_html", "generate_case_studies_html");
add_action("wp_ajax_nopriv_generate_case_studies_html", "generate_case_studies_html");


function generate_case_studies_html() {
	$term = $output = "";
   	$offset = $_POST['offset'];
   	if($_POST['termId'] == "all"){
   		$term = array(171,183);
   	}
   	else{
   		$term = array($_POST['termId']);
   	}
   	$args = array(
	    'post_type' => 'video',
	    'post_status' => 'publish',
	    'orderby' => 'publish_date',
	    'order' => 'DESC',
	    'offset' => $offset,
	    'posts_per_page' => 4,
	    'tax_query' => array(
	        array(
	            'taxonomy' => 'video_cat',
	            'field' => 'id',
	            'terms' => $term
	        )
	    )
	);
	$the_showcase_query = new WP_Query( $args );
	global $post;
	while ( $the_showcase_query->have_posts() ) : $the_showcase_query->the_post(); 
		$thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
		if($thumb == ""){
			$thumb = get_bloginfo('template_directory').'/images/case-study-temp3.png';
		}
		$output .= 	'<div class="g-col offset_default">
	                    <div class="one-half image-block">
	                        <img src="'.$thumb.'">
	                    </div>    
	                    <div class="one-half">
	                        <h3 class="sec-title">'.get_the_title().'</h3>
	                        <p class="block-ellipsis">'.get_the_excerpt().'</p>
	                        <a href="'.get_the_permalink().'" title="View Case Study +" class="text-link"> View Case Study +</a>
	                    </div>     
	                </div>';
	endwhile;
	echo $output;
   die();
}












/*============================================================================================
				  Browser detect : used to define 'brwsr' js var for expand_box.js
============================================================================================*/

/*======================================================
				  HTML Minifyer
======================================================*/




?>