<?php
/**
 * Custom meta boxes
 *
 */

add_action('admin_menu','ps_press_meta_init');
function ps_press_meta_init(){
	
	// meta boxes on press
	add_meta_box('press_custom_meta', 'Press custom info', 'ps_press_meta_setup', 'press', 'normal', 'high');

	// add a callback function to save any data a user enters in
	add_action('save_post','ps_press_meta_save');
}



$press_meta_names = array(
	'press_media',
	'press_url',
	'press_quote',
	'press_quote_by',
	'press_activate',
	'press_title'
);


function ps_press_meta_setup()
{
	global $post, $press_meta_names;
	
	// get all meta
	foreach($press_meta_names as $meta){
		$$meta = get_post_meta($post->ID, '_'. $meta, true);
	}
	
 	?>
 	<p>
		<label for="press_media">Media name</label>
		<input type="text" name="_press_media" id="press_media" value="<?php if(!empty($press_media)) echo $press_media; ?>"/>
		<span class="description">The medias name example: Smashing magazine</span>
	</p>
 	<p>
		<label for="press_url">Media url</label>
		<input type="text" class="widefat" name="_press_url" id="press_url" value="<?php if(!empty($press_url)) echo $press_url; ?>"/>
		<span class="description">The source url</span>
	</p>
	<p>
		<label for="press_title">Title</label>
		<input type="text" class="widefat" name="_press_title" id="press_title" value="<?php if(!empty($press_title)) echo $press_title; ?>"/>
		<span class="description">Link title</span>
	</p>
	<p>
		<label for="press_quote">Quote</label>
		<textarea class="widefat" name="_press_quote" id="press_quote"><?php if(!empty($press_quote)) echo $press_quote; ?></textarea>
		<span class="description">A quote to show on front or elsewhere</span>
	</p>
	<p>
		<label for="press_quote_by">Quotes by</label>
		<input type="text" name="_press_quote_by" id="press_quote_by" value="<?php if(!empty($press_quote_by)) echo $press_quote_by; ?>"/>
		<span class="description">The person who made the quote</span>
	</p>
	<p>
		<label for="press_activate">Activate</label>
		<input type="checkbox" name="_press_activate" id="press_activate" <?php checked($press_activate, 1); ?> value="1" />
		<span class="description">Activate the press/quote to show up in a "spinner"</span>
	</p>
	
	
 	<?php



	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="press_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function ps_press_meta_save($post_id)
{
	// authentication checks
	// make sure data came from our meta box
	if (!isset($_POST['press_meta_noncename']) || !wp_verify_nonce($_POST['press_meta_noncename'],__FILE__)) return $post_id;
	// check user permissions
	if ($_POST['post_type'] == 'press'){
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	// authentication passed, save data
	
	
	global $press_meta_names;
	
	
	foreach($press_meta_names as $m){
		if (!isset($_POST['_'. $m]) || is_null($_POST['_'. $m])) delete_post_meta($post_id, '_'. $m);
		else update_post_meta($post_id, '_'. $m, $_POST['_'. $m]);
	}

	return $post_id;
}