<?php
/**
 * - Custom tag text and position
 * - Save google refer search
 * - Gravity forms custom defaults
 * - Shortcodes
 * - - search_terms
 * - - services
 * - - desc_table
 * - - magtube
 * - - magclear
 * - - column
 * - - events
 * - Tinymce classes
 * - Get page ID by slug
 * - Clean meta
 */


// Used for press quotes
add_shortcode('fade_slideshow', 'mag_fade_slideshow_shortcode');
function mag_fade_slideshow_shortcode(){
	extract( shortcode_atts( array(
		'slug' => 'quotes'
	), $atts ) );

	$out = '<div class="press-wrapper"><div class="fade-gallery press-fade">';
	$args = array(
		'post_type' => 'magslide',
		'posts_per_page' => -1,
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'magslide_pos',
				'field' => 'slug',
				'terms' => array('quotes')
			)
		)
	);
	$q = new WP_Query($args);
	$i = 0;
	if($q->have_posts()): while($q->have_posts()): $q->the_post();

		$out .= '<div class="press-quote-item"><table><tr><td>';
			$out .= '<span class="press-quote">
					<span class="quote">&ldquo;</span>'. get_the_title() .'<span class="quote">&rdquo;</span>
				</span><br />
				<span class="press-by">';
					$out .= get_the_excerpt();
				$out .= '</span>
			</td></tr></table></div>
		';
	endwhile; endif;
	$out .= '</div></div>';
	return $out;
}



// Old remove later
add_shortcode('mag_press', 'mag_press_shortcode');
function mag_press_shortcode(){

	$out = '<div class="press-wrapper"><div class="fade-gallery press-fade">';
	$args = array(
		'post_type' => 'press',
		'orderby' => 'rand',
		'posts_per_page' => -1,
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

		$out .= '<div class="press-quote-item"><table><tr><td>';
			$out .= '<span class="press-quote">
					<span class="quote">&ldquo;</span>'. $meta['_press_quote'][0] .'<span class="quote">&rdquo;</span>
				</span><br />
				<span class="press-by">';
					if(!empty($meta['_press_quote_by'][0])){
						$out .= ''. $meta['_press_quote_by'][0] .', ';
					 }
					//$out .= '<a href="'. $meta['_press_url'][0] .'" target="_blank">
						$out .= $meta['_press_media'][0];
					//</a>
				$out .= '</span>
			</td></tr></table></div>
		';
	endwhile; endif;
	$out .= '</div></div>';
	return $out;
}







add_shortcode('what_is_magplus', 'what_is_magplus_shortcode');
function what_is_magplus_shortcode($atts, $content){
	extract( shortcode_atts( array(
		'link' => false
	), $atts ) );

	$out = '
	<div class="what-is-magplus">
		<img src="'. get_template_directory_uri() .'/images/what-is-top.jpg" alt="What is Mag+" class="what-is-top-img">
		<ul class="what-is-magplus-ul">
			<li class="what-is-1">
				<h3>1. Create</H3>
				<p>
					Design your content in InDesign
					with the Mag+ Plugin. Add
					online content, interactivity,
					movies &amp; sound.<br>Easy.
				</p>
			</li>
			<li class="what-is-2">
				<h3>2. Preview</h3>
				<p>
					Instantly preview your content
					on any device with the
					<a href="http://www.magplus.com/what-is-magplus/works-with-all-major-devices/">Mag+ Reviewer app</a>. Share with your
					team or client. Lightning fast.
				</p>
			</li>
			<li class="what-is-3">
				<h3>3. Finish</h3>
				<p>
					Assemble your content, build
					and configure your app
					using Mag+ Publish,
					our web based tool.<br>No coding.
				</p>
			</li>
			<li class="what-is-4">
				<h3>4. Publish</h3>
				<p>
					Publish your app on<br>Google Play, Amazon Appstore<br>&amp; iTunes App Store.<br>
					Off you go!
				</p>
			</li>
		</ul><div class="clear"></div>';

	if($link){
		$out .= '<div class="what-is-tour-wrap"> <a href="'. $link .'" class="alignright secondary-button colorbox-iframe">
			2 minutes
			<img class="what-play-button" title="play-button" src="http://www.magplus.com/wp-content/uploads/2011/10/play-button.png" alt="" width="30" height="31">
			</a>';
		$out .= '<h5 class="alignright what-is-tour">Watch the full tour!</h5> </div>';
	}
	$out .= '</div>';
	return $out;
}

/**
 * Portuguese
 */
add_shortcode('what_is_magplus_pt', 'what_is_magplus_pt_shortcode');
function what_is_magplus_pt_shortcode($atts, $content){
  extract( shortcode_atts( array(
    'link' => false
  ), $atts ) );

  $out = '
  <div class="what-is-magplus">
    <img src="'. get_template_directory_uri() .'/images/what-is-top.jpg" alt="What is Mag+" class="what-is-top-img">
    <ul class="what-is-magplus-ul">
      <li class="what-is-1">
        <h3>1. Crie</H3>
        <p>
          Projecte o seu conteúdo no InDesign com o Plugin Mag+. Adicione conteúdo, interactividadem filmes & som.<br>Fácil.
        </p>
      </li>
      <li class="what-is-2">
        <h3>2. Pré-visualize</h3>
        <p>
          Pré-visuailize/Instaneamente o seu conteúdo em qualquer dispositivo com o app
          <a href="http://www.magplus.com/what-is-magplus/works-with-all-major-devices/">Mag+ Reviewer</a>. Partilhe com a sua equipe. Tão rápido como um relâmpago.
        </p>
      </li>
      <li class="what-is-3">
        <h3>3. Termine</h3>
        <p>
          Organize o seu conteúdo, construa e configure a sua app usando Mag+Publish, a nossa ferramenta baseada na web.<br>Sem codificação.
        </p>
      </li>
      <li class="what-is-4">
        <h3>4. Publique</h3>
        <p>
          Publique a sua app no<br>Google Play, Amazon Appstore<br>e iTunes App Store.<br>
          E está pronto!
        </p>
      </li>
    </ul><div class="clear"></div>';

  if($link){
    $out .= '<div class="what-is-tour-wrap"> <a href="'. $link .'" class="alignright secondary-button colorbox-iframe">
      2 minutos
      <img class="what-play-button" title="play-button" src="https://www.magplus.com/wp-content/uploads/2011/10/play-button.png" alt="" width="30" height="31">
      </a>';
    $out .= '<h5 class="alignright what-is-tour">Veja todo o processo!</h5> </div>';
  }
  $out .= '</div>';
  return $out;
}









/**
 *
 */
function custom_tag_text_position($args){

	$default = array(
		'id' => false,
		'pos' => 3,
		'text' => 'More information about [mag_tag]',
		'prefix' => '',
		'suffix' => ''
	);

	$args = array_merge($default, $args);

	if(count(wp_get_post_tags( $args['id'])) <= 0) return;

	$tag_pos = get_post_meta($args['id'], '_tag_text_pos', true);
	$tag_text = get_post_meta($args['id'], '_tag_wrapp_text', true);

	$tag_text = str_replace(array('{','}'), '', $tag_text);
	if($tag_pos == $args['pos'] || $args['pos'] === 3){
		echo $args['prefix'];
		if(empty($tag_text)){
			echo do_shortcode($args['text']);
		}else{
			echo do_shortcode($tag_text);
		}
		echo $args['suffix'];
	}
}






/**
 * Get the serach term if the visitor has googled
 *
 * Define the value, cookie or false PS_SEARCH_TERMS
 */
add_action('after_setup_theme', 'ps_save_google_search_terms');
function ps_save_google_search_terms(){
	$referring_page = parse_url( $_SERVER['HTTP_REFERER'] );
	if( stristr( $referring_page['host'], 'google.' ) ){ // google.
		parse_str( $referring_page['query'], $query_vars );
		$term = $query_vars['q'];
		setcookie("ps_search_term", $term, false, '/');
	}elseif(isset( $_COOKIE['ps_search_term'] ) ){
		$term = $_COOKIE['ps_search_term'];
	}else{
		$term = false;
	}
	define('PS_SEARCH_TERMS', $term);
}

/****************************************************************************************/
/*
/* Gravity forms
/*
/*
/* Inserts the users X if the user is logged in and X is set
/* X is set as dynamic vaule in the gravity form field
/*
/****************************************************************************************/
/**
 * user_id
 */
add_filter("gform_field_value_user_id", "get_magplus_user_id");
function get_magplus_user_id($value){
	$data = magplus_logged_in_check();
	if($data){ return $data->user_id; }
	return false;
}
/**
 * user_name
 */
add_filter("gform_field_value_user_name", "get_magplus_user_name");
function get_magplus_user_name($value){
	$data = magplus_logged_in_check();
	if($data){ return $data->name; }
	return false;
}
/**
 * user_email
 */
add_filter("gform_field_value_user_email", "get_magplus_user_email");
function get_magplus_user_email($value){
	$data = magplus_logged_in_check();
	if($data){ return $data->email; }
	return false;
}
/**
 * user_phone
 */
add_filter("gform_field_value_user_phone", "get_magplus_user_phone");
function get_magplus_user_phone($value){
	$data = magplus_logged_in_check();
	if($data){ return $data->phone; }
	return false;
}
/**
 * mag_country
 */
add_filter("gform_field_value_mag_country", "get_magplus_mag_country");
function get_magplus_mag_country($value){
	$country_data = get_user_country_by_ip();
	if($country_data){
		$country = json_decode($country_data);
		if(isset($country->countryName)){
			return ucwords(strtolower($country->countryName));
		}
	}
	return false;
}


/****************************************************************************************/
/*
/* Shortcodes
/*
/****************************************************************************************/
/**
 * Echo search terms else default content
 */
add_shortcode('search_terms', 'ps_search_terms_shortcode');
function ps_search_terms_shortcode( $atts, $content = null ) {
	$terms = PS_SEARCH_TERMS;
	if( $terms ){
		return $terms;
	}else{
		return $content;
	}
}

/**
 * custom_message
 *
 * Creates a custom message depending of the url
 */
add_shortcode('custom_message', 'ps_custom_message_shortcode');
function ps_custom_message_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'get' => 'new_user',
		'class' => 'success-box'
	), $atts ) );

	if(isset($_GET[$get])){
		return '<div class="custom-message remove-me '. $class .'"><div class="remove-x"><img src="'.bloginfo('template_directory').'/images/remove.png" alt="x" title="remove notification"></div>'. $content .'</div>';
	}else{
		return '';
	}
}

/**
 * services_1
 *
 * Create a expandable list for services
 */
add_shortcode('services_1', 'ps_services_1_shortcode');
function ps_services_1_shortcode( $atts, $content = null ) {
	$out = '
	<div class="sslide-table">
		<div class="f-row-title group">
			<div class="f-col">Support</div>
		</div>
		<div class="f-row group expand-row">
			<div class="alignleft">
				Managed App submission
			</div>
			<div class="alignright orange-text">$1000</div>
			<div class="t-description hidden">
				You finish your first issue and help page. You open a developer account with Apple, Google Play or Amazon.
				We will send you a list of needed assets (icons, loading screens, etc) and we will build your app in Mag+ Publish,
				send you a test app to review and, when you sign off, we will submit your app to the platform of your choice for you.
				Apps must still go through standard Apple or Amazon approval process but we will correct any Mag+ bugs to ensure
				the app is approved. We cannot be responsible for any content-related rejections.
			</div>
			<!--span class="expand-row"></span-->
		</div>

		<div class="f-row group expand-row">
			<div class="alignleft">
				One-hour dedicated webinar
			</div>
			<div class="alignright orange-text">$499</div>
			<div class="t-description hidden">
				Get a one-hour personal web-chat and screenshare with one of the Mag+ creative
				team to ask any question about using the platform or building and submitting your app.
			</div>
		</div>

		<div class="f-row group f-row-bottom expand-row">
			<div class="alignleft">
				Email creative help desk**
			</div>
			<div class="alignright orange-text">$100/month</div>
			<div class="t-description hidden">
				Email our creative staff with questions about the Mag+
				tools or platform anytime. Guaranteed reply within 48 hours.
			</div>
		</div>
	</div>';
	return $out;
}

/**
 * desc_table
 *
 * Inserts a table created by a txt-file in the folder 'texts'
 * ## for title and | for the other col
 * \n (breake) for new row
 */
add_shortcode('desc_table', 'ps_desc_table_shortcode');
function ps_desc_table_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'file' => 'pdf'
	), $atts ) );

	$file =  TEMPLATEPATH .'/texts/'. $file .'.txt';
	if( !file_exists($file) ) return;
	$text = file( $file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$text = array_map('rtrim',$text);

	$out = '<div class="slide-table">';
	foreach( $text as $row ){
		if( strpos($row, '##') === 0 ){
			$out .= '<div class="f-row-title group">
					<div class="f-col">'. substr($row, 2) .'</div>
				</div>';
		}else{
			$col = explode('|', $row);
			$out .= '<div class="f-row group">
					<div class="pdf-col pdf-col-1">'. $col[0] .'</div>
					<div class="pdf-col pdf-col-2">'. $col[1] .'</div>
				</div>';
		}
	}
	$out .= '</div>';

	return $out;
}

/**
 * magtube
 *
 * Insert a youtube clip correctly
 */
add_shortcode('magtube', 'magtube_short');
function magtube_short($atts, $content){
	extract(shortcode_atts(array(
	      'width' => '540',
	      'url' => 'http://www.youtube.com/embed/videoseries?list=PL0DF6C85FCEF93372&amp;hl=en_US'
     ), $atts));
    // calculate the 16:9 height
	$height = ceil(9/16*$width);
	return '<div class="magtube"><iframe width="'. $width .'" height="'. $height .'" src="'. $url .'" frameborder="0" allowfullscreen></iframe></div>';
}
/**
 * magclear
 *
 * Insert a clear div
 */
add_shortcode('magclear', 'magclear_short');
function magclear_short(){ return '<div class="clear"></div>'; }

/**
 * Column shortcode
 *
 * [column width="30.66%" padding="4%"] Text [/column]
 * [column last="true"] Text [/column]
 */
/*add_shortcode('column', 'ps_column_shortcode');
function ps_column_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'width' => '48%',
		'padding' => '4%',
		'last' => false
	), $atts ) );
	$style = 'width:'.$width.';';
	if($last) $style .= ' padding-right: 0;';
	else $style .= ' padding-right: '. $padding .';';
	// remove empty p
	$pattern = "/<p[^>]*><\\/p[^>]*>/";
	$content = preg_replace($pattern, '', do_shortcode(trim($content)));
	$out = '<div>' . trim($content) . '</div>';
	if($last) $out .= '<div class="clear"></div>';
	return $out;
}*/

/**
 * events
 *
 * Display a list of upcoming events
 */
add_shortcode('events', 'ps_events_shortcode');
function ps_events_shortcode( $atts, $content = null ) {
	global $post;
	extract( shortcode_atts( array(
		'number' => '3',
		'title' => 'Events'
	), $atts ) );

	$args = array(
		'post_type' => 'event',
		'posts_per_page' => $number,
		'meta_key' => 'event_start_date',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'event_end_date',
				'value' => current_time('timestamp'),
				'compare' => '>='
			)
		)
	);
	$q = new WP_Query($args);
	$out ='<div class="ps-event-widget group">
		<h3 class="widet-title">'. $title .'</h3>
		<ul>';
	if($q->have_posts()): while($q->have_posts()): $q->the_post();
		$date = get_post_meta($post->ID, 'event_end_date', true);
		$out .= '<li class="row">
			<div class="light-desc ps-event-date">'. date('j M Y', $date) .'</div>
			<a href="'. get_permalink($post->ID) .'">'. get_the_title() .'</a>
			</li>';
	endwhile; endif; wp_reset_postdata();
		$out .= '</ul>
			<a href="'. get_post_type_archive_link('event') .'">See all events &raquo;</a>
			</div>';
	return $out;
}

/**
 * mag_line
 */
add_shortcode('mag_line', 'ps_line_shortcode');
function ps_line_shortcode( $atts, $content = null ) {
	return '<div class="clear mag-line"></div>';
}






/****************************************************************************************/
/*
/* TinyMCE classes
/*
/*
/* Add custom classes to the TinyMCE editor
/*
/****************************************************************************************/
add_filter('tiny_mce_before_init', 'custom_tinymce_classes'); // Custom options for TinyMCE editor
function custom_tinymce_classes($initArray) {
	if(!isset($initArray['theme_advanced_styles'])) $initArray['theme_advanced_styles'] = '';
	$classes = array(
		'primary-button' => 'Primary button (green)',
		'big-primary-button' => 'Big primary button (green, 2 rows)',
		'secondary-button' => 'Secondary button (orange)',
		'big-secondary-button' => 'Big secondary button (orange, 2 rows)',
		'ps-analytics' => 'Analytics tracking (title = identifier)',
		'just-a-break-in-the-tinymce-list' => '-----------',
		'align-flushright' => 'Align outside right',
		'align-flushleft' => 'Align outside left',
		'aligncenter' => 'Align center',
		'alignleft' => 'Align left',
		'alignright' => 'Align right',
		'clear' => 'Clear both'
	);
    foreach($classes as $css => $name) {
        $initArray['theme_advanced_styles'] .= $name.'='.$css.';';
    }
    $initArray['theme_advanced_styles'] = rtrim($initArray['theme_advanced_styles'], ';'); // Remove final semicolon from list
    return $initArray;
}

function get_dl_button( $atts ) {
	extract( shortcode_atts( array(
		'position' => null
	), $atts, 'download_button' ) );
	return '<a class="big-primary-button download-tool '.$position.'" id="primary-download-tool" href="http://www.magplus.com/signup"><strong><img class="size-full wp-image-4366" title="download-arrow" alt="" src="http://www.magplus.com/wp-content/uploads/2011/10/download-arrow.png" width="24" height="25" />Get the tools for free </strong> Pay only when you’re ready to launch</a>';
}
add_shortcode('download_button', 'get_dl_button');





/**
 * Get ID by slug
 *
 * @param string $slug post_type name/slug
 * @return int ID
 */
function ps_get_id_by_slug($slug){
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."' AND post_type='page'");
	return $page_name_id;
}



function subNav($postID){
	$ancestors = get_post_ancestors($postID);
	$top_ancestor = array_pop($ancestors);
	$top_ancestor = ($top_ancestor == null)? $postID : $top_ancestor;
	$children = get_pages(array('child_of' => $top_ancestor, 'depth' => 1));
	//Show children: wp_list_pages(array('child_of' => $top_ancestor, 'depth' => 1));

	//echo (get_the_title( $top_ancestor));
	if((get_the_title( $top_ancestor)=='Services') && (isset($children) && $children != null)){
		$children = wp_list_pages("title_li=&include=".$top_ancestor."&echo=0");
		$children.= compressHtml(wp_list_pages("title_li=&child_of=".$top_ancestor."&depth=1&echo=0"));
		//echo($children);
		$children = str_replace(">Services</a>",">Overview</a>",$children);
		$fromPublish = isset($_GET['from_publish'])? ' from-publish' : '';
		$menu = '<div id="subNav"><ul class="wrapper '.$fromPublish.'">';
			$menu .= $children;
		$menu .= '</ul>';
		$menu .= '</div>';
	    echo $menu;
	}

	else if((isset($children) && $children != null)){
		$children = wp_list_pages("title_li=&include=".$top_ancestor."&echo=0");
		$children.= compressHtml(wp_list_pages("title_li=&child_of=".$top_ancestor."&depth=1&echo=0"));
		$fromPublish = isset($_GET['from_publish'])? ' from-publish' : '';
		$menu = '<div id="subNav"><ul class="wrapper '.$fromPublish.'">';
			$menu .= $children;
		$menu .= '</ul>';
		$menu .= '</div>';
	    echo $menu;
	}else if(is_post_type_archive('press')){
		echo '<!-- somethings is strange -->';
		$id = ps_get_id_by_slug('press');
		$ancestors = get_post_ancestors($id);
		$top_ancestor = array_pop($ancestors);
		$children = wp_list_pages("title_li=&child_of=".$top_ancestor."&depth=1&echo=0");
		$fromPublish = isset($_GET['from_publish'])? ' from-publish' : '';
		$menu = '<div id="subNav"><ul class="wrapper '.$fromPublish.'">';
			$menu .= $children;
		$menu .= '</ul></div>';
	    echo $menu;
	}
	else{
		return;
	}
}


/**
 * Loops through an array and removes empty values
 * @param  array $arr The array to clean
 * @return array
 */
function ps_clean_meta_func(&$arr){
	if (is_array($arr)){
		foreach ($arr as $i => $v){
			if (is_array($arr[$i])){
				ps_theme_meta_clean($arr[$i]);
				if (!count($arr[$i])){
					unset($arr[$i]);
				}
			}else{
				if (trim($arr[$i]) == ''){
					unset($arr[$i]);
				}
			}
		}
		if (!count($arr)){
			$arr = NULL;
		}
	}
}

//Add wp-admin css & js, when on page where you're editing a post.
function load_custom_wp_admin_style($hook) {
        wp_register_style( 'custom_wp_admin_styles', get_template_directory_uri() . '/custom_wp_admin_styles.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_styles' );
	wp_enqueue_script( 'custom_wp_admin_script', get_template_directory_uri() . '/js/custom_wp_admin_script.js' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );





if (! function_exists('dashboard_footer') ){
	function dashboard_footer() {
		global $pagenow, $post_type;
		if($post_type != null){
			$text = "Comments on the wordpress admin? Something broken? Please let me know! <br>victoria@magplus.com";
			return;
		}
	}
}
add_filter('admin_footer_text', 'dashboard_footer');

function right_admin_footer_output($text) {
		$text = "Something stopped working inside wordpress? Please let me know! <br>victoria@magplus.com";
		return;
}
add_filter('update_footer', 'right_admin_footer_output', 90); //right side



//Ahh måste behålla den här funktionen för sidebar navigeringen...
//Plocka bort/refaktorera denna när jag kommer dit i trello
/**
 * Is a child or has children
 *
 * @param id = $post->ID
 * @return a menu or false
 */
function ps_submenu($id, $echo = false, $showParent = true, $depth = 0){
	global $wpdb;
	// if is a post
	$thePostID = $id;// alt to under
	$current_page = $thePostID; //get_the_ID();
	while($current_page) {
		$page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
		$current_page = $page_query->post_parent;
	}
	$parent_id = $page_query->ID;
	$parent_title = $page_query->post_title;
	$page_menu = wp_list_pages('echo=0&depth='. $depth .'&title_li=&child_of='. $parent_id);
	// echo or not
	if($echo){
		// add current class on post-type archive
		$page_menu = str_ireplace('page-item-'. $id, 'page-item-'. $id .' current_page_item', $page_menu);
		$subPages = explode("\n", $page_menu);
		// add class first and last
		$last = (count($subPages) - 2);
		$subPages[0] = str_replace('class="', 'class="first ', $subPages[0]);// last
		$subPages[$last] = str_replace('class="', 'class="last ', $subPages[$last]);// last
		// if the parent is the current page
		if($thePostID == $parent_id){
			$class = " current_page_item";
		}else{
			$class = "";
		}
		echo '<li class="ps-subnav"><ul class="ps-subnav-ul">';
			// if to show the parent in the menu
			if($showParent){
				echo '<li class="parent-page page_item'.$class.'" ><a href="'.get_permalink($parent_id).'">'.$parent_title.'</a></li>';
			}

			// echo all the pages
			foreach($subPages as $page){
				echo $page ."\n";
			}
		echo '</ul></li>';
			}else{
		return $page_menu;
		return;
	}
}