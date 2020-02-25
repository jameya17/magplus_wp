<?php
/**
 * Custom meta boxes
 *
 */

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
if ($post_id == '7517'){
	add_action('admin_menu','page_what_is_magplus_init');
	function page_what_is_magplus_init(){
		// meta boxes on press
		add_meta_box('page_what_is_magplus', 'What is Mag+ ?', 'page_what_is_magplus_content', 'page', 'normal', 'high');

		// add a callback function to save any data a user enters in
		add_action('save_post','page_what_is_magplus_save');

	}

	function page_what_is_magplus_content(){
		global $post;
		$firstTextarea = get_post_meta($post->ID, 'page_wimp_firstTextArea', true);
		$secondTextarea = get_post_meta($post->ID, 'page_wimp_secondTextArea', true);
		$thirdTextarea = get_post_meta($post->ID, 'page_wimp_thirdTextArea', true);
		$fourthTextarea = get_post_meta($post->ID, 'page_wimp_fourthTextArea', true);
		$fifthTextarea = get_post_meta($post->ID, 'page_wimp_fifthTextArea', true);
		$sixthTextarea = get_post_meta($post->ID, 'page_wimp_sixthTextArea', true);
		$settings = array(
				   'tinymce' => array(
					'theme_advanced_disable' => 'emotions,fullscreen,styleprops,mce_wp_more,wp_page,pasteword,attribs,print,removeformat,backcolor'
				    )
				  );

		$settings['textarea_name'] = 'page_wimp_firstTextArea';
		$content = empty($firstTextarea)? '' : $firstTextarea;
		wp_editor( $content, 'page_wimp_firstTextArea', $settings );

		$settings['textarea_name'] = 'page_wimp_secondTextArea';
		$content = empty($secondTextarea)? '' : $secondTextarea;
		wp_editor( $content, 'page_wimp_secondTextArea', $settings );

		$settings['textarea_name'] = 'page_wimp_thirdTextArea';
		$content = empty($thirdTextarea)? '' : $thirdTextarea;
		wp_editor( $content, 'page_wimp_thirdTextArea', $settings );

		$settings['textarea_name'] = 'page_wimp_fourthTextArea';
		$content = empty($fourthTextarea)? '' : $fourthTextarea;
		wp_editor( $content, 'page_wimp_fourthTextArea', $settings );

		$settings['textarea_name'] = 'page_wimp_fifthTextArea';
		$content = empty($fifthTextarea)? '' : $fifthTextarea;
		wp_editor( $content, 'page_wimp_fifthTextArea', $settings );

		$settings['textarea_name'] = 'page_wimp_sixthTextArea';
		$content = empty($sixthTextarea)? '' : $sixthTextarea;
		wp_editor( $content, 'page_wimp_sixthTextArea', $settings );
			?>

		<script>
			jQuery(document).ready(function($){
				$("#postdivrich, #add_gform, .mceIcon.mce_emotions, .mceIcon.mce_print").hide();
			});
		</script>
	<?php
			// create a custom nonce for submit verification later
			echo '<input type="hidden" name="page_meta_noncename_what_is_magplus" value="' . wp_create_nonce(__FILE__) . '" placeHolder="Menu here">';

	}

	function page_what_is_magplus_save($post_id) {

			if (!isset($_POST['page_meta_noncename_what_is_magplus']) || !wp_verify_nonce($_POST['page_meta_noncename_what_is_magplus'],__FILE__)) return $post_id;

			// check user permissions
			if ($_POST['post_type'] == 'page'){
				if (!current_user_can('edit_page', $post_id)) return $post_id;
			}

			// authentication passed, save data

			$meta = array(
				'page_wimp_title',
				'page_wimp_firstTextArea',
				'page_wimp_secondTextArea',
				'page_wimp_thirdTextArea',
				'page_wimp_fourthTextArea',
				'page_wimp_fifthTextArea',
				'page_wimp_sixthTextArea'
			);


			foreach($meta as $m){
				if (!isset($_POST[$m]) || is_null($_POST[$m])) delete_post_meta($post_id, $m);
				else update_post_meta($post_id, $m, $_POST[$m]);
			}

			return $post_id;
	}
}





add_action('admin_menu','page_add_script_to_footer_init');

function page_add_script_to_footer_init(){
	global $current_user;
	if($current_user->caps['administrator']){
		// meta boxes on press
		add_meta_box('page_add_code_to_footer', 'Adding scripts to footer', 'page_add_script_to_footer_content', 'page', 'normal', 'low');

		// add a callback function to save any data a user enters in
		add_action('save_post','page_add_script_to_footer_save');
	}
}

	function page_add_script_to_footer_content(){
		global $post;
		$footer_scripts_textarea = get_post_meta($post->ID, 'page_footer_scripts', true);

		echo '<textarea name="page_footer_scripts">'.$footer_scripts_textarea.'</textarea>';
		// create a custom nonce for submit verification later
		echo '<input type="hidden" name="page_meta_noncename_footer_scripts" value="' . wp_create_nonce(__FILE__) . '" placeHolder="Menu here">';
	}


	function page_add_script_to_footer_save($post_id) {

			if (!isset($_POST['page_meta_noncename_footer_scripts']) || !wp_verify_nonce($_POST['page_meta_noncename_footer_scripts'],__FILE__)) return $post_id;

			// check user permissions
			if ($_POST['post_type'] == 'page'){
				if (!current_user_can('edit_page', $post_id)) return $post_id;
			}

			// authentication passed, save data
				if (!isset($_POST['page_footer_scripts']) || is_null($_POST['page_footer_scripts'])) delete_post_meta($post_id, 'page_footer_scripts');
				else update_post_meta($post_id, 'page_footer_scripts', $_POST['page_footer_scripts']);

			return $post_id;
	}
