<?php
/*
 * - Add javascript in admin
 * - Add CSS in admin 
 */





add_filter( 'attachment_fields_to_edit', 'landingpage_custom_image', 20, 2 );
function landingpage_custom_image($fields, $post ) {

	$id = (int) $post->ID;
	$text = 'Landingpage bg';
	$button = '<a data-id="' . $id . '" rel="'. wp_get_attachment_thumb_url($id) .'" class="button-primary ps-landing-img" href="#">' . $text . '</a>';
	$fields['image-size']['extra_rows']['ps_landing_img_input']['html'] = $button;
	return $fields;
}
function is_number($value){
	
} 


/*
 * Add javascript to the admin
 */
add_action("admin_print_scripts", 'ps_add_js_to_admin');
function ps_add_js_to_admin(){
	wp_enqueue_script('jquery-colorpicker', get_bloginfo('template_url') . '/admin/colorpicker.js', array('jquery'));
	wp_enqueue_script('ps_theme_admin_js', get_bloginfo('template_url') . '/admin/ps_admin.js', array('jquery'));
}


/*
 * Add CSS to the admin
 */
add_action("admin_print_styles", 'ps_add_css_to_admin');
function ps_add_css_to_admin(){
	wp_enqueue_style('ps_theme_admin_css', get_bloginfo('template_url') . '/admin/ps_admin.css');
}
