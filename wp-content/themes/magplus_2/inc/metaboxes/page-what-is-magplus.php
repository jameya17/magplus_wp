<?php
/**
 * Custom meta for page What is Mag+ ?
 *
 */

add_action('admin_menu','ps_page_meta_init');
function ps_page_meta_init(){

	// meta boxes on press
	add_meta_box('page_custom_meta', 'Alternative headline', 'ps_page_meta_setup', 'page', 'normal', 'high');

	// add a callback function to save any data a user enters in
	add_action('save_post','ps_page_meta_save');
}



function ps_page_meta_setup()
{
	global $post;


	$title = get_post_meta($post->ID, '_alt_page_title', true);
	$title_color = get_post_meta($post->ID, '_alt_page_title_color', true);
 	?>
 	<p>
		<label for="ps_alt_page_title">Alternative title</label>
		<input type="text" class="widefat" name="_alt_page_title" id="ps_alt_page_title" value="<?php if(!empty($title)) echo $title; ?>"/>
		<!-- <span class="description">Wrap some words in the sentence whit &lt;strong&gt;for orange words&lt;/strong&gt;</span>-->
	</p>


 	<?php

	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="page_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function ps_page_meta_save($post_id)
{
	// authentication checks
	// make sure data came from our meta box
	if (!isset($_POST['page_meta_noncename']) || !wp_verify_nonce($_POST['page_meta_noncename'],__FILE__)) return $post_id;
	// check user permissions
	if ($_POST['post_type'] == 'page'){
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	// authentication passed, save data


	$meta = array(
		'_alt_page_title',
		'_alt_page_title_color'
	);


	foreach($meta as $m){
		if (!isset($_POST[$m]) || is_null($_POST[$m])) delete_post_meta($post_id, $m);
		else update_post_meta($post_id, $m, $_POST[$m]);
	}

	return $post_id;
}
