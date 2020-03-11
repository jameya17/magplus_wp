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
//require_once($inc_path. 'signup.php');
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


add_action("wp_ajax_generate_tutorials_html", "generate_tutorials_html");
add_action("wp_ajax_nopriv_generate_tutorials_html", "generate_tutorials_html");

function generate_tutorials_html(){
	$output = "";
	$offset = $_POST['offset'];
   	if($_POST['termId'] == "all"){
   		$term = array(366,367,100);
   	}
   	else{
   		$term = explode(",", $_POST['termId']);
   	}
   	$args = array(
        'post_type' => 'video',
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC',
        'offset' => $offset,
        'posts_per_page' => 9,
        'tax_query' => array(
            array(
                'taxonomy' => 'video_cat',
                'field' => 'id',
                'terms' => $term
            )
        )
    );
    $the_tutorials_query = new WP_Query( $args );
    $i = 0;
    global $post;
    while ( $the_tutorials_query->have_posts() ) : $the_tutorials_query->the_post();
    $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
    $video_id = get_post_meta($post->ID, '_mag_video_id', true);
    $service = get_post_meta($post->ID, '_mag_video_service', true);
    
    if($service == 'vimeo'){
        $video = 'https://player.vimeo.com/video/'. $video_id .'?title=0&amp;byline=0&amp;portrait=0';
    }elseif($service == 'youtube'){
        $video = 'https://www.youtube.com/embed/'. $video_id .'?rel=0';
    }
    if($i == 0){
    	$output .= '<ul class="video-section video-listing">';
    }
    	$output .= '<li>
                        <a href="'.$video.'" title="" data-fancybox title="">
                            <img src="'.$thumb.'" alt="" />
                            <span class="video-play-btn"></span>
                            <span class="play-text">Watch Tutorial</span>
                        </a>
                        <strong class="tutorials-title">'.get_the_title().'</strong>    
                    </li>';

    $i++;
    if($i == 3) {
    	$i = 0;
    	$output .= '</ul>';
    }
    endwhile;
    echo $output;
	die();
}

add_action("wp_ajax_generate_tutorials_checkbox_html", "generate_tutorials_checkbox_html");
add_action("wp_ajax_nopriv_generate_tutorials_checkbox_html", "generate_tutorials_checkbox_html");

function generate_tutorials_checkbox_html(){
	$term = $output = "";
	if($_POST['termId'] == "all"){
   		$term = array(366,367,100);
   	}
   	else{
   		$term = explode(",", $_POST['termId']);
   	}
	$total = $noOfPages = 0;
    $args = array(
        'post_type' => 'video',
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC',
        'posts_per_page' => 9,
        'tax_query' => array(
            array(
                'taxonomy' => 'video_cat',
                'field' => 'id',
                'terms' => $term
            )
        )
    );
    $the_tutorials_query = new WP_Query( $args );
    $total = $the_tutorials_query->found_posts;
    $noOfPages = ceil($total/9);
    $output .= '<ul class="pagination">
        		<li class="page-item" id="previous-page"><a class="page-link" href="javascript:void(0)"><img src="'.get_bloginfo('template_directory').'/images/icons/pagination-prev.svg" alt=""></a></li>';
        
        for($i=1; $i<=$noOfPages; $i++){
        	$className = "";
        	if($i == 1){
        		$className = "active"; 
        	}
            $output .= '<li class="page-item '.$className.' current-page pageId-'.$i.'"> <a class="page-link" href="javascript:void(0)">'.$i.'</a></li>';
        }
    $output .= '<li class="page-item" id="next-page"><a class="page-link" href="javascript:void(0)"><img src="'.get_bloginfo('template_directory').'/images/icons/pagination-next.svg" alt=""></a></li>';
        
    $output .= '</ul>';

    $output .= '<div class="video-container">';
                
                    
                $i = 0;
                	global $post;
                    while ( $the_tutorials_query->have_posts() ) : $the_tutorials_query->the_post();
                        $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
                        $video_id = get_post_meta($post->ID, '_mag_video_id', true);
                        $service = get_post_meta($post->ID, '_mag_video_service', true);
                        
                        if($service == 'vimeo'){
                            $video = 'https://player.vimeo.com/video/'. $video_id .'?title=0&amp;byline=0&amp;portrait=0';
                        }elseif($service == 'youtube'){
                            $video = 'https://www.youtube.com/embed/'. $video_id .'?rel=0';
                        }
                        if($i == 0){
                            $output .= '<ul class="video-section video-listing">';

                        }
                        	$output .= '<li>
	                                    <a href="'.$video.'" title="" data-fancybox title="">
	                                        <img src="'.$thumb.'" alt="" />
	                                        <span class="video-play-btn"></span>
	                                        <span class="play-text">Watch Tutorial</span>
	                                    </a>
	                                    <strong class="tutorials-title">'.get_the_title().'</strong>    
	                                </li>';
                       
                        $i++;
                        if($i == 3) { 
                            $i = 0;
                       
                        	$output .= '</ul>';
                        }

                
                    endwhile; 
                
            $output .= '</div>'; 

            $output .= '<ul class="pagination pagination-bottom">
		        		<li class="page-item" id="previous-page"><a class="page-link" href="javascript:void(0)"><img src="'.get_bloginfo('template_directory').'/images/icons/pagination-prev.svg" alt=""></a></li>';
		        
		        for($i=1; $i<=$noOfPages; $i++){
		        	$className = "";
		        	if($i == 1){
		        		$className = "active"; 
		        	}
		            $output .= '<li class="page-item '.$className.' current-page pageId-'.$i.'"> <a class="page-link" href="javascript:void(0)">'.$i.'</a></li>';
		        }
		    $output .= '<li class="page-item" id="next-page"><a class="page-link" href="javascript:void(0)"><img src="'.get_bloginfo('template_directory').'/images/icons/pagination-next.svg" alt=""></a></li>';
		        
		    $output .= '</ul>';  

		    $output .= '<input type="hidden" id="term_id" value="'.$_POST['termId'].'" />';
            $output .= '<input type="hidden" id="current_page" value="1" />';
            $output .= '<input type="hidden" id="total_pages" value="'.$noOfPages.'" />';  

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