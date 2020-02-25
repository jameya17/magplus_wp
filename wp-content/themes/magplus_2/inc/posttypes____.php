<?php




/*
 *   Exclude the press category in the media
 */
function exclude_in_media($query) {
	#if ($query->is_archive) {
	if(!is_admin() && is_post_type_archive( 'press' )){
		$query->set('tax_query', array(
			array(
				'taxonomy' => 'press_cat',
				'field' => 'slug',
				'terms' => 'in-the-media',
				'operator' => 'NOT IN'
			)
		));
	}
	return $query;
}
add_filter('pre_get_posts','exclude_in_media');



add_action('init', 'ps_register_posttypes');
function ps_register_posttypes()
{

	$args = array(
	'label' => 'Articles',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('with_front' => false),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments', 'page-attributes')
	);
	register_post_type('articles',$args);





	/**
	 * Press
	 *
	 *
	 * Register post type
	 * Add custom taxonomy
	 * Add column
	 */
	$args = array(
		'label' => 'Press',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('with_front' => false, 'slug' => 'blog/press'),
		'capability_type' => 'page',
		'taxonomies' => array('category'),
		'has_archive' => 'about/press',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments', 'page-attributes')
	);
	register_post_type('press',$args);

	// Add new taxonomy, make it hierarchical (like categories)
	register_taxonomy('press_cat',array('press'), array(
		'hierarchical' => true,
		'label' => 'Press Category',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'press-media' ),
	));


	add_filter('manage_edit-press_columns', 'add_new_press_columns');
	function add_new_press_columns($press_columns) {

		$new_columns['cb'] = '<input type="checkbox" />';
		$new_columns['title'] = 'Press title';
		#$new_columns['ps_id'] = 'ID';
		$new_columns['press_cat'] = 'In the media';
		$new_columns['press_link'] = 'Link';
		$new_columns['ps_thumbnail'] = 'Featured img';
		$new_columns['date'] = 'Date';

		return $new_columns;
	}

	add_action('manage_press_posts_custom_column', 'manage_press_columns', 10, 2);
	function manage_press_columns($column_name, $id) {
		global $wpdb;
		switch ($column_name) {
			case 'press_cat':
				$terms = wp_get_post_terms( $id, 'press_cat', array("fields" => "names") );
				if(in_array('In the media', $terms)){
					echo 'Yes';
				}
			break;

			case 'press_link':
				$link = trim(get_post_meta( $id, '_press_url', true));
				if(isset($link) && !empty($link)){
					echo '&bull;';
				}
			break;

			case 'ps_thumbnail':
				$thumb = get_the_post_thumbnail( $id, array(100,100), array('height' => '100') );
				if($thumb) echo $thumb .' - ';
				echo $id;
			break;
			default:
			break;
		} // end switch
	}



	/**
	* Clients
	*
	*
	* Clients previous Publications
	*/
	/*
	$args = array(
		'label' => 'Clients',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments', 'page-attributes')
	);
	register_post_type('clients',$args);
	*/

	/********************************************************************[   Mag+ Media   ]*/

	/**
	 * mag_media
	 *
	 *
	 * Register post type
	 * Add custom taxonomy
	 */
	$args = array(
		'label' => 'Video',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('with_front' => false, 'slug' => 'video'),
		'capability_type' => 'page',
		//'taxonomies' => array('category'),
		'has_archive' => 'video',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments', 'page-attributes')
	);
	register_post_type('video',$args);

	// Add new taxonomy, make it hierarchical (like categories)
	register_taxonomy('video_cat',array('video'), array(
		'hierarchical' => true,
		'label' => 'Media category',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'playlist' ),
	));




	/**************************************************/
	/*
	/* Events
	/*
	/**************************************************/
	$args = array(
		'label' => 'Events',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('with_front' => false, 'slug' => 'events'),
		'capability_type' => 'page',
		//'taxonomies' => array('category'),
		'has_archive' => 'events',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments')
	);
	register_post_type('event',$args);
	register_taxonomy('event-categories',array('event'), array(
		'hierarchical' => true,
		'label' => 'Event category',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'events-categories' ),
	));





	/**************************************************/
	/*
	/* Slideshow
	/*
	/**************************************************/
	$args = array(
		'label' => 'Slideshow',
		'public' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => false,
		'capability_type' => 'page',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','thumbnail','excerpt', 'page-attributes')
	);
	register_post_type('magslide',$args);
	register_taxonomy('magslide_pos',array('magslide'), array(
		'hierarchical' => true,
		'label' => 'Slide position',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => false
	));

	register_taxonomy('devices',array('magslide'), array(
		'hierarchical' => true,
		'label' => 'Devices',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => false
	));


	/**************************************************/
	/*
	/* Support Service
	/*
	/**************************************************/



		$args = array(
			'label' => 'Support Info',
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array('with_front' => false, 'slug' => 'support-info'),
			'capability_type' => 'page',
			//'taxonomies' => array('category'),
			'has_archive' => 'support-info',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','author','thumbnail','excerpt')
		);
		register_post_type('support-info',$args);
		flush_rewrite_rules();
		register_taxonomy('service-categories',array('support-info'), array(
			'hierarchical' => true,
			'label' => 'Service Info Categories',
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'service-info-categories' ),
		));
	


}




/**************************************************/
/*
/* Tag SEO
/*
/**************************************************/
// Need to add the table {prefix}post_tagmeta
// add the post_tag meta to wpdb prefix
add_action('init', 'add_post_tag_wpdb_prefix');
function add_post_tag_wpdb_prefix(){
	global $wpdb;
	$wpdb->post_tagmeta = $wpdb->prefix."post_tagmeta";
}
// Save the meta data
add_action( 'edited_post_tag', 'save_post_tags_info', 10, 2);
function save_post_tags_info($term_id, $tt_id){
	if (!$term_id) return;

	$seo = $_POST['tag_seo'];
	ps_clean_meta_func($seo);
	if (is_null($seo)) delete_metadata($_POST['taxonomy'], $term_id, 'tag_seo');
	else update_metadata('post_tag', $term_id, 'tag_seo', $seo);

	$style = $_POST['tag_style'];
	ps_clean_meta_func($style);
	if (is_null($style)) delete_metadata($_POST['taxonomy'], $term_id, 'tag_style');
	else update_metadata('post_tag', $term_id, 'tag_style', $style);

	if (is_null($_POST['tag_custom_title'])) delete_metadata($_POST['taxonomy'], $term_id, 'tag_custom_title');
	else update_metadata('post_tag', $term_id, 'tag_custom_title', $_POST['tag_custom_title']);
}
// the input fields
add_action( 'post_tag_edit_form_fields', 'edit_extra_post_tags_fields', 10, 2);
function edit_extra_post_tags_fields($tag, $taxonomy){
	$seo = get_metadata($tag->taxonomy, $tag->term_id, 'tag_seo', true);
	$style = get_metadata($tag->taxonomy, $tag->term_id, 'tag_style', true);
	$custom_title = get_metadata($tag->taxonomy, $tag->term_id, 'tag_custom_title', true);
	?>

	<tr class="form-field">
		<th scope="row" valign="top"><label for="tag_seo_title">SEO Title</label></th>
		<td>
			<input type="text" name="tag_seo[title]" id="tag_seo_title"
				value="<?php if(isset($seo['title'])) echo $seo['title']; ?>"/><br />
			<p class="description">The title max 70 the shorter the better</p>
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="tag_seo_title">SEO description</label></th>
		<td>
			<input type="text" name="tag_seo[desc]" id="tag_seo_desc"
				value="<?php if(isset($seo['desc'])) echo $seo['desc']; ?>"/><br />
			<p class="description">The meta description max 160 chars</p>
		</td>
	</tr>

	<tr class="form-field">
		<th scope="row" valign="top"><label for="tag_style_bg">Background</label></th>
		<td>
			<input type="text" name="tag_style[bg]" id="tag_style_bg"
				value="<?php if(isset($style['bg'])) echo $style['bg']; ?>"/><br />
			<p class="description">Url to background image</p>
		</td>
	</tr>

	<tr class="form-field">
		<th scope="row" valign="top"><label for="tag_style_ld">Light or dark?</label></th>
		<td>
			<select name="tag_style[ld]">
				<option value="">Default</option>
				<option <?php if(isset($style['ld'])) selected('light', $style['ld']); ?> value="light">Light</option>
				<option <?php if(isset($style['ld'])) selected('dark', $style['ld']); ?> value="dark">Dark</option>
			</select>
			<p class="description">Light or dark background</p>
		</td>
	</tr>

	<tr class="form-field">
		<th scope="row" valign="top"><label for="tag_custom_title">Custom title</label></th>
		<td>
			<input type="text" name="tag_custom_title" id="tag_custom_title"
				value="<?php echo $custom_title; ?>"/><br />
			<p class="description">Custom big title for the page</p>
		</td>
	</tr>
	<?php
}
// Change the title
add_filter('wp_title', 'custom_tag_title', 10, 3);
function custom_tag_title( $title, $sep, $seplocation ) {
	if(is_tag()){
		$seo = get_metadata('post_tag', get_query_var('tag_id'), 'tag_seo', true);
		if(isset($seo['title'])){
			return htmlentities($seo['title']);
		}
	}
	return $title;
}
// Add the description
add_filter('wp_head', 'custom_tag_description');
function custom_tag_description() {
	if(is_tag()){
		$seo = get_metadata('post_tag', get_query_var('tag_id'), 'tag_seo', true);
		if(isset($seo['desc'])){
			echo '<meta name="description" content="'. htmlentities($seo['desc']) .'">';
		}
	}
}
