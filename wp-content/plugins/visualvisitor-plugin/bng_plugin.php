<?php
/**
 * @package Bng_Plugin
 * @version 1.6
 */
/*
Plugin Name: Visual Visitor
Plugin URI: http://www.visualvisitor.com/
Description: Visual Visitor turns anonymous website visitors into qualified sales leads
Author: Visual Visitor, LLC
Version: 1.6
Author URI: http://www.visualvisitor.com/
*/

@session_start();



function themeslug_enqueue_script() {
	wp_enqueue_script( 'Post Curl',  plugins_url('/js/script.js', __FILE__),array ( 'jquery' ), 1.1, true ,true);	
	wp_enqueue_style( 'Css',  plugins_url('/style.css', __FILE__));


}
add_action( 'admin_enqueue_scripts', 'themeslug_enqueue_script' );

function bng_settings_menu()
	{
		add_options_page(
	        'Visual Visitor',
	        'Visual Visitor',
	        'manage_options',
	        'bng_script_footer',
	        'bng_settings_page'
	    	);
	   
	}

function bng_settings_page()
	{
		echo '<div style="max-width:700px">';
		$url_image = plugins_url('/visual_visitor.png', __FILE__);
	    include 'view_install.php';
	    echo '</div>';
	}


add_action('admin_menu','bng_settings_menu');

function bng_get_button_name() {
	echo (get_option("bng_new_footer")) ? "Update" : "Install";
	exit;
}

function bng_settings_notices_bng_migration_setting( $object_id, $updated )
	{
	    if ( $object_id !== 'bng_script_footer' || empty( $updated ) ) {
	        return;
	    }

	    add_settings_error( 'bng_script_footer' . '-notices', '', __( 'Settings updated.', 'myprefix' ), 'updated' );
	    settings_errors( 'bng_script_footer' . '-notices' );
	}

function bng_response_post(){
	remove_action('wp_footer','add_this_script_footer',11);

	$email = $_POST['bng_email'];
	$pass = $_POST['bng_password'];
	$url = 'https://app.visualvisitor.com/Account/WPLogin';

	
	$response = wp_remote_post( $url, array(
		'method' => 'POST',
		'timeout' => 45,
		'headers' => array(
			'Content-Type'=>'application/x-www-form-urlencoded',
			'User-Agent' => 'Mozilla /5.0 (Compatible MSIE 9.0;Windows NT 6.1;WOW64; Trident/5.0)'
			),
		'body' => array( 'email' => $email, 'password' =>  $pass),
		'cookies' => array()
	    )
	);
	$json_script = json_encode($response);

	
	$script_text = json_decode( $json_script , true ) ;
	$success = json_decode($script_text['body']);
	
	if ($success->msg == 'Authentication Failed.') {
		//$_SESSION['bng_message_footer']='';
		update_option( 'bng_message_footer', '' );
	}else
	{
		//$_SESSION['bng_message_footer'] = $success->msg;
		update_option( 'bng_message_footer', $success->msg );
		update_option("bng_new_footer", "saved");
	}

	
	echo json_encode($response);
	exit;

}


add_action('wp_ajax_bng_response_post','bng_response_post');
add_action('wp_ajax_bng_get_button_name','bng_get_button_name');


function remove_this_script_footer(){

	remove_action('wp_footer','add_this_script_footer',11);
	delete_option("bng_new_footer");
	//unset($_SESSION['bng_message_footer']);
	delete_option('bng_message_footer');
	exit;
}

add_action('wp_ajax_remove_this_script_footer','remove_this_script_footer');


function add_this_script_footer(){ 

	//echo ( isset($_SESSION['bng_message_footer']) ) ? $_SESSION['bng_message_footer'] : '';
	echo (get_option('bng_message_footer')) ? get_option('bng_message_footer') : '';
	
} 

add_action('wp_footer', 'add_this_script_footer'); 

?>
