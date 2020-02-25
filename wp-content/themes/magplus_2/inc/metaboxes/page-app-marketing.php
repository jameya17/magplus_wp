<?php
/**
 * Custom meta boxes
 *
 */

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
if ($post_id == '14254' || $post_id == '16043'){

add_action('admin_menu','page_app_marketing_init');
function page_app_marketing_init(){
	// meta boxes on press
	add_meta_box('page_app_marketing', 'App Marketing', 'page_app_marketing_content', 'page', 'normal', 'high');
	remove_meta_box('commentsdiv', 'post', 'normal');
	// add a callback function to save any data a user enters in
	add_action('save_post','page_app_marketing_save');

}

function page_app_marketing_content(){
	global $post;
	$firstTextarea = get_post_meta($post->ID, 'page_appmarketing_firstTextArea', true);
	$secondTitle = get_post_meta($post->ID, 'page_appmarketing_secondTitle', true);
	$secondTextarea = get_post_meta($post->ID, 'page_appmarketing_secondTextArea', true);
	$settings = array(
			   'tinymce' => array(
				'theme_advanced_disable' => 'emotions,fullscreen,styleprops,mce_wp_more,wp_page,pasteword,attribs,print,removeformat,backcolor'
			    )
			  );

	$settings['textarea_name'] = 'page_appmarketing_firstTextArea';
	$content = empty($firstTextarea)? '' : $firstTextarea;
	wp_editor( $content, 'page_appmarketing_firstTextArea', $settings );

	echo '<input type="text" name="page_appmarketing_secondTitle" id="page_appmarketing_secondTitle" style="font-size: 20px; width: 90%;" value="'.$secondTitle.'">';

	$settings['textarea_name'] = 'page_appmarketing_secondTextArea';
	$content = empty($secondTextarea)? '' : $secondTextarea;
	wp_editor( $content, 'page_appmarketing_secondTextArea', $settings );

?>

	<script>
		jQuery(document).ready(function($){
			$("#postdivrich, #add_gform, .mceIcon.mce_emotions, .mceIcon.mce_print, #commentsdiv, #postexcerpt, #post_custom_meta, #page_puffar, #postimagediv, #tagsdiv-post_tag").hide();
			$('#page_app_marketing').removeClass('closed');
		});
	</script>
<?php
		// create a custom nonce for submit verification later
		echo '<input type="hidden" name="page_meta_noncename_app_marketing" value="' . wp_create_nonce(__FILE__) . '" placeHolder="Menu here">';

}

function page_app_marketing_save($post_id)
{
		if (!isset($_POST['page_meta_noncename_app_marketing']) || !wp_verify_nonce($_POST['page_meta_noncename_app_marketing'],__FILE__)) return $post_id;

		// check user permissions
		if ($_POST['post_type'] == 'page'){
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		}

		// authentication passed, save data

		$meta = array(
			'page_appmarketing_firstTextArea',
			'page_appmarketing_secondTitle',
			'page_appmarketing_secondTextArea'
		);



		foreach($meta as $m){
			if (!isset($_POST[$m]) || is_null($_POST[$m])) delete_post_meta($post_id, $m);
			else update_post_meta($post_id, $m, $_POST[$m]);
		}

		return $post_id;
}

}