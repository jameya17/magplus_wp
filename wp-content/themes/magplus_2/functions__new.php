<?php

/**
 * MAG+ THEME SETTINGS
 *
 * - Login
 * - require
 * - Theme setup
 * - include javascript
 */


function cachBust($sheetDir){
	if($_SERVER['HTTP_HOST']!== 'www.magplus.com'){
		return '?'.filemtime($sheetDir);
	}
	else{
		return "";
	}
}



function compressHtml($content){
    $content = preg_replace('~>\s+<~', '><', $content);
    $content = preg_replace('/\s\s+/', ' ', $content);
    $i = 0;
    while ($i < 5) {
        $content = str_replace('  ', ' ', $content);
        $i++;
    }

    return $content;
}

function cfp($atts, $content = null) {
    extract(shortcode_atts(array( "id" => "", "title" => "", "pwd" => "" ), $atts));

    if(empty($id) || empty($title)) return "";

    $cf7 = do_shortcode('[contact-form-7 404 "Not Found"]');

    $pwd = explode(',', $pwd);
    foreach($pwd as $p) {
        $p = trim($p);

        $cf7 = preg_replace('/<input type="text" name="' . $p . '"/usi', '<input type="password" name="' . $p . '"', $cf7);
    }

    return $cf7;
}

    add_shortcode('cfp', 'cfp');
/*add_filter( 'wp_nav_menu_items', 'add_home_link', 10, 2 );
function add_home_link($items, $args) {
	global $post;

	if($args->theme_location != 'primary-menu' || !magplus_logged_in_check()){
		return $items;
	}

	if (is_page(MY_MAGLUS_ID) || $post->post_parent == MY_MAGLUS_ID || isset($_GET['from_publish']))
		$class = 'class="menu-item current-menu-item"';
	else
		$class = 'class="menu-item mymag"';

	$homeMenuItem =
		'<li ' . $class . '>' .
			$args->before .
			'<a href="' . get_permalink( MY_MAGLUS_ID ) . '" title="Home">' .
				$args->link_before . 'My Mag+' . $args->link_after .
			'</a>' .
			$args->after .
		'</li>';

	$items = $items .  $homeMenuItem;

	return $items;
} */

function add_btn_mymag() {
	global $post;

	if(!magplus_logged_in_check()){
		//return '';
	}

	if (is_page(MY_MAGLUS_ID) || $post->post_parent == MY_MAGLUS_ID || isset($_GET['from_publish']))
		$class = 'class="menu-item current-menu-item"';
	else
		$class = 'class="menu-item mymag"';

	$btn_mymag =
		'<li ' . $class . '>' .
			'<a href="' . get_permalink( MY_MAGLUS_ID ) . '" title="Home" target="_blank">My Mag+</a>'.
		'</li>';

	return $btn_mymag;
}


function price($prod = 'per-issue'){
	switch ($prod) {
		case 'per-issue':
			return '$999';
		case 'monthly':
			return '$399/mo';
		case 'Unlimited':
			return '$2,999/mo';
		case 'monthly':
			return '$499';
		case 'MAS': // Managed App Submission
			return '$999';
		case 'DTW': // dedicated traning webinar
			return '$499';
		default:
			return 'An error please contact support';
	}
}




function SearchFilter($query) {
	if ($query->is_search) {
		if(isset($_GET['post_type'])){
			$query->set('post_type', $_GET['post_type'] );
		}else{
			$query->set('post_type', array('post', 'video') );
		}
	}
	return $query;
}
add_filter('pre_get_posts','SearchFilter');

// allow html in cat/tag descriptions
$filters = array('pre_term_description', 'term_description', 'category_description', 'pre_user_description');
foreach ( $filters as $filter ) {
	remove_filter($filter, 'wp_filter_kses');
}
// Replace + sign on uploaded file name
function magplus_add_chars($special_chars) {
	$special_chars[] = "+";
	return $special_chars;
}
add_filter('sanitize_file_name_chars', 'magplus_add_chars');





/**
 * Do the lookup of the location in advance
 *
 * Example: Signup use ip to get phone number prefix
 * in shortcode after output had begun and cookie can't be set
 */
/*add_filter('template_redirect', 'init_get_country_by_ip');
function init_get_country_by_ip(){
	print_r($page);
	#if( is_page(array('signup')) ){
	get_user_country_by_ip();
	#}
}*/



function tutsplus_widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'tutsplus' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title1 widget-title-wht">',
        'after_title' => '</h3>',
    ) );
 
    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area', 'tutsplus' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title1 widget-title-wht">',
        'after_title' => '</h3>',
    ) );
 
    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area', 'tutsplus' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title1 widget-title-wht">',
        'after_title' => '</h3>',
    ) );
 
    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Fourth Footer Widget Area', 'tutsplus' ),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'The fourth footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title1 widget-title-wht">',
        'after_title' => '</h3>',
    ) );
         
}
 
// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'tutsplus_widgets_init' );



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






// Tell WordPress to run magplus_theme_setup() when the 'after_setup_theme' hook is run.
add_action( 'after_setup_theme', 'magplus_theme_setup' );
if ( ! function_exists('magplus_theme_setup') ):
	function magplus_theme_setup() {

		define('MY_MAGLUS_ID', 4858);

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// add excerpt to pages
		add_post_type_support( 'page', 'excerpt' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 180, 300, false );
		add_image_size('clients-thumb', 380, 9999, false );
		add_image_size( 'press-archive-sizes', 150, 150 ); // Soft Crop Mode
		//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

		// add custom menus
		register_nav_menus( array(
			'primary-menu' => 'Main menu',
			'top-menu' => 'Top menu',
			'footer-menu-platform' => 'Footer menu : Platform',
			'footer-menu-about' => 'Footer menu : about',
			//'footer-menu-social' => 'Footer menu : social',
			'footer-menu-company' => 'Footer menu : Company',
			'logged-in-menu' => 'Logged in sub menu'
		));

		add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to head

		// remove option to post from client
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'rsd_link');
		// don't tell the version of wordpress
		add_filter('the_generator', '__return_false');
	}
endif;



add_action('init', 'add_tags_to_post_types');
function add_tags_to_post_types(){
	register_taxonomy_for_object_type('post_tag', 'clients');
	register_taxonomy_for_object_type('post_tag', 'page');
	register_taxonomy_for_object_type('post_tag', 'video');
	register_taxonomy_for_object_type('post_tag', 'press');
}

/**
 *   Change exerpt lenght and suffix
 */
function magplus_excerpt_length( $length ) {
	return 15;
}
#add_filter( 'excerpt_length', 'magplus_excerpt_length' );

function magplus_auto_excerpt_more( $more ) {
	global $post;
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'magplus_auto_excerpt_more' );

// Old code
// code for iframes not being removed all the time
function field_func($atts) {
   global $post;
   $name = $atts['name'];
   if (empty($name)) return;

   return get_post_meta($post->ID, $name, true);
}

add_shortcode('field', 'field_func');



/**********   Add/remove javascript   **********/

add_action('wp_print_scripts', 'ps_include_javascript');
function ps_include_javascript(){
	if (!is_admin()){
		global $post;

		wp_deregister_script('jquery'); //wordpress has a default include of jQuery which we wish to remove

		wp_register_script('modernizr', get_bloginfo('template_url').'/js/modernizr.js', false, false, false);
		wp_enqueue_script( 'modernizr' );

		if( !'ENVIRONMENT' == 'local'){
			//For easy A/B testing
			wp_register_script('optimizely', '//cdn.optimizely.com/js/137797958.js', false, false, false);
			wp_enqueue_script( 'optimizely' );
		}

		//http://codex.wordpress.org/Function_Reference/wp_register_script

		if( !'ENVIRONMENT' == 'local' && $_SERVER['SERVER_NAME'] != 'd3v.magplus.com' ){
			wp_register_script('mint', '/mint/?js', false, false, true);
			wp_enqueue_script( 'mint' );
			wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), '1.7.1', true);
		}else{
			wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery.min.js', array(), '1.7.2', true);
			wp_enqueue_script( 'jquery' );
		}
		wp_enqueue_script( 'jquery' );


		// Mag+ custom scripts
		$js_folder = get_template_directory_uri() . "/js/";

		wp_enqueue_script('vendors', $js_folder. 'vendors/vendors.min.js', array('jquery'), 0, true);

		wp_enqueue_script("Ps_theme_code", $js_folder ."min/scripts.min.js".cachBust(get_stylesheet_directory()), array('jquery'), "2.9.7", true);
		wp_localize_script( 'Ps_theme_code', 'psVar', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

		wp_register_script('homepage', $js_folder. 'min/magplus-homepage.min.js', array('jquery'),  '1.3', true);
		wp_register_script('features_carousel', $js_folder. 'min/magplus-features.min.js', array('jquery'),  '1.1', true);
		
		// if is event page load table sorter
		
		if( is_tax('event-categories') or ($post->post_type == 'event') or ($post->post_name == 'events')){
			wp_enqueue_script("sorttable", $js_folder ."sorttable.js", array(), "2", true);
		}
	}else{
		global $post_type;
		if( 'event' == $post_type )
			wp_enqueue_script( 'jquery-ui-datepicker' );
	}
}
add_action('admin_print_styles', 'ps_include_css');
function ps_include_css(){
	if (!is_admin()){
		wp_deregister_style('events-manager');
	}else{
		global $post_type;
		if( 'event' == $post_type ){
			wp_register_style("jquery-ui-datepicker2", get_template_directory_uri() ."/admin/jquery-ui-1.8.20.custom.css");
			wp_enqueue_style("jquery-ui-datepicker2");
		}
	}
}

function features_carousel_js() {
	wp_enqueue_script('features_carousel');
}

add_action('features_carousel', 'features_carousel_js');



function homepage_js() {
	wp_enqueue_script('homepage');
}

add_action('homepage', 'homepage_js');



function buy_thanks_scripts_js() {
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js'.cachBust(get_stylesheet_directory()), array('perfect_scroll', 'headroom'), false, true);

}

add_action('buy_thanks_scripts', 'buy_thanks_scripts_js');

/**
 * Get an image connected to a post
 *
 * Returns the post thumbnail if it exists else searches for the first img in the post
 * @param int $id the post ID
 * @param string $content The post content
 * @return string|false the img url else false
 */

function ps_get_post_img( $id, $content ){
	if(has_post_thumbnail($id)){
		return wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	}else{
		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
		$first_img = $matches [1] [0];
		if(!empty($first_img)){
			return $first_img;
		}else{
			return false;
		}
	}
}


/**
 * Create share buttons in posts
 *
 * LinkedIn script move
 */
function ps_insert_social_buttons( $args = array() ) {
	global $post;
	$defaults = array (
		'icons'  =>   true,
		'size'  =>   32,
		'title' => get_the_title(),
		'url' => get_permalink(),
		'desc' => get_the_excerpt(),
		'short_link' => $post->guid,
		'twitter_name' => 'magplus',
		'share_title_before' => '<strong>',
		'share_title_after' => '</strong>',
		'share_title' => 'Share with your friends!'
	);

	extract(array_merge( $defaults, $args ));

	// urldecode and strip tags
	$title = urlencode($title);
	$url = urlencode($url);
	$desc = strip_tags(urlencode($desc));
	$short_link = urlencode($short_link);

	if(!$icons): ?>
		<div class="social-header social-likes group">
			<div class="alignleft">
				<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count"></div>
			</div>
			<div class="alignleft">
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-via="magplus" data-lang="en">Tweet</a>
			</div>
			<div class="alignleft">
				<div class="g-plusone"  data-size="medium"></div>
			</div>
			<div class="alignleft">
				<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
				<script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>
			</div>
		</div>
	<?php else:
		$social = array(
			'pinterest' => array(
				'width' => 700,
				'height' => 300,
				'url' => 'http://pinterest.com/pin/create/button/?url='. $url
					.'&amp;media='. urlencode( ps_get_post_img($post->ID, $post->post_content) )
					.'&amp;description='. $desc
			),
			'facebook' => array(
				'width' => '550',
				'height' => '400',
				'url' => 'http://www.facebook.com/share.php?u='. $url .'&t='. $title
			),
			'twitter' =>  array(
				'width' => '550',
				'height' => '420',
				'url' => 'https://twitter.com/share?original_referer='. $url .'&source=custom_tweetbutton&text='. $title .'&url='. $url .'&via='. $twitter_name
			),
			'googleplus' =>  array(
				'width' => '450',
				'height' => '500',
				'url' => 'https://plusone.google.com/_/+1/confirm?hl=en&url='. $url
			),
			'delicious' =>  array(
				'width' => '560',
				'height' => '550',
				'url' => 'http://delicious.com/save?v=5&url='. $url .'&title='. $title .'&noui&jump=close', //.'&notes='. $desc
			),
			'linkedin' =>  array(
				'width' => '575',
				'height' => '450',
				'url' => 'http://www.linkedin.com/shareArticle?mini=true&url='. $url .'&title='. $title .'&source=Magplus&summary='. $desc
			),
			'stumbleupon' =>  array(
				'width' => '750',
				'height' => '450',
				'url' => 'http://www.stumbleupon.com/submit?url='. $url .'&title='. $title
			)
		);
		?>
		<!-- * Can probably be removed -->
		<div class="social-box social-footer social-likes">
			<?php echo $share_title_before . $share_title . $share_title_after; ?><br />
			<?php
			foreach($social as $name => $s){
				echo '<a class="social-link social-link-'. $name .'" data-name="'. $name .'" data-width="'.
					$s['width'] .'" data-height="'.
					$s['height'] .'" href="'.
					$s['url'] .'"><img src="'. get_template_directory_uri() .'/social-icons/'. $size .'/'. $name .'.png" alt="'. $name .'" /></a>';
			}
			?>
		</div>
	<?php endif;
}
/**
 * Share button
 */
function ps_share_button( $args = array() ){
	$defaults = array(
		'link_text' => 'Share',
		'type' => 'facebook',
		'class' => '',
		'link' => 'http://www.magplus.com/',
		'share_text' => 'Check out Mag+. Tools for publishing iPad & Android content apps',
		// facebook
		'picture' => 'http://www.magplus.com/images/logo-grey-350.png',
		'name' => 'Mag+',
		'caption' => '',
		'description' => 'Check out Mag+. Tools for publishing iPad & Android content apps',
		'track' => 'fb_share_button',
		// twitter
		'button_size' => 'medium',
		'twitter_via' => 'magplus',
		'twitter_count' => 'horizontal' // none, horizontal, vertical
	);
	extract(array_merge( $defaults, $args ));
	$out = '';

	if( $type == 'twitter' ){
		$out = '<a href="https://twitter.com/share" class="twitter-share-button '. $class .'" data-url="'. $link
			.'" data-size="'. $button_size
			.'" data-text="'. $share_text
			.'" data-count="'. $twitter_count
			.'" data-via="'. $twitter_via .'" data-lang="en">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
	}else{
		// facebook
		$out = '<a class="facebook-share '. $class .'" data-picture="'. $picture
		.'" data-name="'. $name
		.'" data-picture="'. $picture
		.'" data-caption="'. $caption
		.'" data-description="'. $description
		.'" data-track="'. $track
		.'" href="'. $link .'">'. $link_text .'</a>';
	}
	return $out;
}
// create shortcode for sharing buttons
function ps_share_button_shortcode( $atts ) {
	return ps_share_button( $atts );
}
add_shortcode( 'share_button', 'ps_share_button_shortcode' );







/**
 * Add rules to the robots.txt
 *
 * prevents robots from wp-admin feed comments and more
 */
add_filter('robots_txt', 'ps_robots_dot_txt');
function ps_robots_dot_txt($output) {
	return $output .'Disallow: /cgi-bin
Disallow: /wp-admin
Disallow: /api
Disallow: /wp-includes
Disallow: /wp-content/plugins
Disallow: /wp-content/cache
Disallow: /wp-content/themes
Disallow: /trackback
Disallow: /feed
Disallow: /comments
Disallow: /category/*/*
Disallow: */trackback
Disallow: */feed
Disallow: */comments
Disallow: /*?*
Disallow: /*?
Allow: /wp-content/uploads
';
}


function custom_message(){ //Modal boxes, bootstrap style
	$messages = array(
		'new-user' => array(
			'type' => 'success',  //is this a green/red/yellow (success, warning, info box?)
			'message' => 'Your Mag+ account has been created. Welcome!' //Thanks for creating your Mag+ account!
		),
		'new-user-fail' => array(
			'type' => 'error',  //is this a green/red/yellow (success, warning, info box?)
			'message' => 'We were not able to create an account for you. Perhaps you already have an account?' //Thanks for creating your Mag+ account!
		)
	);

	$which_message = isset($_GET['message']) ? $_GET['message'] : false;  //If empty do nothin, else fetch correct message

	if($which_message && ($messages[$which_message] !== null)){
		echo '<div class="alert remove-me alert-'.$messages[$which_message]['type'].'">',
		'<button data-dismiss="alert" class="close remove-x" type="button">×</button>';
		echo $messages[$which_message]['message'];
		echo '</div>';
	}
}





function DisplayPingTrackbacks() {

    // Do not do anything if Disqus is not installed
    if(!dsq_is_installed()) return;

    $current_post_ID = get_the_ID();

    global $wpdb;

    $sql =  "SELECT comment_author_url, comment_date, comment_content, comment_author FROM $wpdb->comments WHERE comment_post_ID = $current_post_ID AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date ASC";

    if ($post_pingtrackbacks = $wpdb->get_results($sql) ) {

        $number_of_pingtrackbacks = count($post_pingtrackbacks);
	echo "<ul>";
        foreach ($post_pingtrackbacks as $post_pingtrackback) {
                        echo "<li><strong>";
                        echo date( 'd F Y ', strtotime( $post_pingtrackback->comment_date ));
                        echo "</strong><br />";
            $comment_summary = $post_pingtrackback->comment_content;
            echo substr( $comment_summary, 0, strrpos( substr( $comment_summary, 0, 90), ' ' ) ) . ' ...';
                        echo "\n<a href='";
            echo $post_pingtrackback->comment_author_url;
            echo "'>";
            $author = $post_pingtrackback->comment_author;
            echo html_entity_decode($author);
            echo "</a>";
            echo "</li>";
        }
        echo "</ul>";
        }
}


//Give editors access to gravity forms
function add_grav_forms(){
    $role = get_role('editor');
    $role->add_cap('gform_full_access');
}
add_action('admin_init','add_grav_forms');


if(!magplus_logged_in_check()){
	$server = $_SERVER['SERVER_NAME'];

	if($_SERVER['REQUEST_URI'] == '/my-magplus/'){
		if($server == 'www.magplus.dev'){
			header('Location: http://login.magplus.dev?origin=http://'.$server.'/my-magplus');
			exit;
		}else{
			header('Location: https://login.magplus.com?origin=http://'.$server.'/my-magplus');
			exit;
		}
	}

	if($_SERVER['REQUEST_URI'] == '/my-magplus/installation/'){
		if($server == 'www.magplus.dev'){
			header('Location: http://login.magplus.dev?origin=http://'.$server.'/my-magplus/installation');
			exit;
		}else{
			header('Location: https://login.magplus.com?origin=http://'.$server.'/my-magplus/installation');
			exit;
		}

	}
}

//Adding stylesheet with version-nr
// If the site isn't on staging or development do use a cached stylesheet
function magplus_styles() {
	//Main css is set here: style.css
	wp_enqueue_style('style', get_stylesheet_uri().cachBust(get_stylesheet_directory()), true, '5.1');
	//wp_enqueue_style('font-awesome.min', get_template_directory_uri().'/css/font-awesome.min.css');
	//wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'magplus_styles' );


function custom_login_logo() {
	echo '<style type="text/css"> x
	#login h1 a {
	    background-image: url(/wp-content/themes/magplus_2/images/magplus-logo-dark.png) !important;
	    background-size: 100% auto!important;
	    height: 100px!important;
	    width: auto!important;
	    margin: 0 0 0 30px!important;
	}
	#login{
	    padding-top: 84px!important;
	}

	#login #rememberme{
	    margin: 0;
	    position: relative;
	    top: -1px;
	}

	#login #wp-submit{
	    padding: 0 13px;
	}
	</style>';
}
add_action('login_head', 'custom_login_logo');


/*============================================================================================
				  Browser detect : used to define 'brwsr' js var for expand_box.js
============================================================================================*/
function browser_body_class() {
	$classes='';
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

$browser = browser_body_class();
$browser=$browser[0];
global $browser;

if(!isset($_COOKIE['mp_browser'])){
  setcookie('mp_browser', $browser, time()+172800, "/"); /*Store browser name. Used in plugin.expand_box.js for a javascript bug*/
 }

if(magplus_logged_in_check()){
	setcookie('mp_loggedin', '1', time()+3600, "/");
}
else{
	setcookie('mp_loggedin', '0', time()+3600, "/");
}

/*======================================================
				  HTML Minifyer
======================================================*/
/*
class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = false;
	protected $remove_comments = true;

	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);
		
		$savings = ($raw-$compressed) / $raw * 100;
		
		$savings = round($savings, 2);
		
		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			
			$content = $token[0];
			
			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;
					
					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;
						
						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
						
						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}
			
			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}
			
			$html .= $content;
		}
		
		return $html;
	}
		
	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);
		
		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}
	
	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		
		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}
		
		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
*/

add_filter('deprecated_constructor_trigger_error', '__return_false');
?>