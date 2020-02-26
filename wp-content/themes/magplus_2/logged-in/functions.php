<?php
/**
 * Mag+ Logged in user functions
 *
 * - CSS
 * - Check cookie
 * - Different check functions
 */

if($_SERVER['SERVER_NAME'] == 'www.magplus.dev') {
    define('ENVIRONMENT', 'local');
} else if($_SERVER['SERVER_NAME'] == 'd3v.magplus.com') {
    define('ENVIRONMENT', 'staging');
} else if($_SERVER['SERVER_NAME'] == 'www.magplus.com'){
    define('ENVIRONMENT', 'production');
}

/*
if('ENVIRONMENT' == local){
	define('MAGPLUS_SECRET', '65b4c7f2387010c2549d951ceed54dfe7eb99218');
	define(PROTOCOL, 'https');
	define('TOP_LEVEL_DOMAIN', 'dev');
}else{
	/** Include secrets file - one level above ABSPATH **/
	//require_once( dirname(ABSPATH) . '/secrets.php' );
	//define(PROTOCOL, 'https');
	//define('TOP_LEVEL_DOMAIN', 'com');
//}

define('MAGPLUS_SECRET', '65b4c7f2387010c2549d951ceed54dfe7eb99218');
define(PROTOCOL, 'https');
define('TOP_LEVEL_DOMAIN', 'dev');


define('MAGPLUS_LOGIN', PROTOCOL.'://login.magplus.'.TOP_LEVEL_DOMAIN.'/');

//If on live site, This logs user out of Support, Support then redirects to login.magplus.com
//older code // define('MAGPLUS_LOGOUT', PROTOCOL.'://login.magplus.'.TOP_LEVEL_DOMAIN.'/logout');
//define('MAGPLUS_LOGOUT', 'https://support.magplus.com/access/logout');
define('MAGPLUS_LOGOUT', 'http://magplus.com/social-login/logout.php');

define('MAGPLUS_START_LOGIN', 'http://www.magplus.'.TOP_LEVEL_DOMAIN.'/my-magplus/');

// add javascript to logged in users
add_action('wp_print_scripts', 'ps_include_logged_in_javascript');
function ps_include_logged_in_javascript(){
	if (!is_admin() && magplus_logged_in_check() ){
		$js_folder = get_template_directory_uri() . "/js/";
		wp_enqueue_script("logged-in-script", $js_folder ."logged-in.js", array('jquery'), "", true);
	}
}


/**
 * Echo the url to publish
 *
 * If the user doesn't have access to publish redirect
 * to the store
 *
 * @param string optional role
 * @return string A link to publish
 */
function mag_publish_url( $role = false ){

	if(has_right_to_publish($role)){
		echo 'https://publish.magplus.com/';
	}else{
		echo get_permalink(3270);
	}
}



/**
 * Check if the visitor is logged in to magplus
 *
 * @return Object|false The cookie info else false
 */
function magplus_logged_in_check(){
	
	if('ENVIRONMENT' == local){
		$cookie_name = 'magplus_session_dev';
	}else{
		$cookie_name = 'magplus_session';
	}
	//print '<pre>';
	//print_r($_COOKIE); 
	if(isset($_COOKIE[$cookie_name])){
		// the secret
		  $secret = MAGPLUS_SECRET;
		// assign the cookie info to data and payload
		$cookie = $_COOKIE[$cookie_name];
		$dt = explode('.', $cookie);
		//print_r($dt);
		
		$data=$dt[0];
		$payload=$dt[1];
		//list($data, $payload) = explode('.', $cookie);
		

		// take the data and hash it with the secret
		 $verify = hash('sha256', $data.$secret);
		//$verify  //	$payload
		
		if(true){
			 $data = json_decode(base64_decode($data));
		//print_r($data);
			// if the date has expired remove the cookie and set false
			if( time() > strtotime($data->expires_at) ){	
				setcookie ($cookie_name, false, time() - 3600, '/', '.magplus.com');
				return false;
			}

			// if all is well return true
			return $data;
		}else{
			//die("data testing");
			// Log that the cookie has been altrered      *** TO DO ***
			setcookie ("$cookie_name", false, time() - 3600, '/', '.magplus.com');
			return false;
		}

	}else{
		return false;
	}
	
}

/**
 * Check if the user is logged in else redirect
 *
 * @uses magplus_logged_in_check() to se the logged in status
 *
 * @param string To a redirect back url after login
 * @return true|redirect If false it redirects to the login page
 */
function magplus_logged_in( $redirect = false){
	// if the user is logged in return true
	if($data = magplus_logged_in_check()) return $data;
	// if a redirect url isn't set use the current
	if(!$redirect) $redirect = ps_get_curr_url();
	header('location: '. MAGPLUS_LOGIN .'?origin='. urlencode($redirect) );
	die();
}

/**
 * Get the current url
 *
 * @return string Current url
 */
function ps_get_curr_url(){
	$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	return $pageURL;
}

/**
 * Get the users role
 *
 * @uses magplus_logged_in_check()
 *
 * @return string|false the users role else false
 */
function mag_get_user_role(){
	$data = magplus_logged_in_check();

	if($data && isset($data->role)){
		return $data->role;
	}else{
		return false;
	}
}

/**
 * Check if the user has access to publish
 *
 * @param $role string The users role
 * @return bool
 */
function has_right_to_publish( $role = false){

	if(!$role) $role = mag_get_user_role();
	$allowed_roles = array('admin', 'brand_admin', 'partner');
	if(in_array($role, $allowed_roles)){
		return true;
	}else{
		return false;
	}
}



/**
 * Add Mag+ logged in class to body
 */
add_filter('body_class','magplus_logged_in_body_class');
function magplus_logged_in_body_class($classes) {
	// add 'class-name' to the $classes array
	if( magplus_logged_in_check() ){
		$classes[] = 'mag-user';
	}
	// return the $classes array
	return $classes;
}






add_action('wp_ajax_resend_activation_mail', 'resend_activation_mail');
add_action('wp_ajax_nopriv_resend_activation_mail', 'resend_activation_mail');
function resend_activation_mail(){
	$user = magplus_logged_in_check();
	if($user){
		$conn = pg_connect(PUBLISH_CONNECT_STRING);
		$user_info = pg_query($conn, "SELECT verify_email_token FROM users WHERE id = ". $user->user_id );
		$token = pg_fetch_object($user_info);
		$token = $token->verify_email_token;

		$message = 'Hi '. $user->name .','. "\n".
			'Here is the activation link you requested:'. "\n".
				'https://publish.magplus.com/registration/verify/'.$token. "\n".
			'Best regards'. "\n".
			'The Mag+ team';
		$headers = 'From: Mag+ <no-reply@magplus.com>' . "\r\n";
		$mail = wp_mail('patrik@magplus.com', 'Mag+ verification', $message, $headers);
		echo $mail .' patrik';
	}else{
		$return = array( 'error' => 'User not logged in');
	}
	return json_encode($return);
	die();
}



/**
 * Get more user info from publish
 *
 * @return object User info (phone
 */
function mag_user_extend_info(){
	// get the current user
	$user = magplus_logged_in_check();
	if( $user ){
		// connect to publish
		$conn = pg_connect(PUBLISH_CONNECT_STRING);
		$user_info = pg_query($conn, "SELECT phone, company FROM users WHERE id = ". $user->user_id );
		return pg_fetch_object($user_info);
	}else{
		return false;
	}
}


/**
 *
 *
 *
 */
add_action('wp_ajax_buy_magplus_form', 'buy_magplus_form');
add_action('wp_ajax_nopriv_buy_magplus_form', 'buy_magplus_form');
function buy_magplus_form(){

	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');

	$user = magplus_logged_in_check();
	$errors = array();

	$data = get_user_country_by_ip();
	$country = $city = $state = false;
	// return XML data
	$params = '';
	if( $data ){
		$data = json_decode($data);
		$country = ($data->countryName) ? $data->countryName : false;
		$state = ($data->regionName) ? $data->regionName : false;
		$city = ($data->cityName) ? $data->cityName : false;
	}

	#if( !$user ){
	#	$errors[] = 'Your not logged in!';
	#}
	if( !$_POST['eula'] ){
		$errors[] = 'Please accept "Mag+ end user license agreement" by checking the box.';
	}
	if( !is_email( $_POST['buy_email'] ) ){
		$errors[] = 'Please enter a valid email address.';
	}

	$prod = strip_tags($_POST['product_to_buy']);

	if( empty($errors) ):
		$message = '
			<h4>Buy '. $prod .'</h4>
			<table cellspacing="10" cellpadding="0" border="0">
				<tr>
					<td>Name:</td>
					<td>'. strip_tags( $_POST['buy_name'] ) .'</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>'. strip_tags( $_POST['buy_email'] ) .'</td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td>'. strip_tags( $_POST['buy_phone'] ) .'</td>
				</tr>
				<tr>
					<td>Country user input:</td>
					<td>'. strip_tags( $_POST['buy_country_input'] ) .'</td>
				</tr>
				<tr>
					<td>Additional devices:</td>
					<td>'. strip_tags( $_POST['buy_extra_input'] ) .'</td>
				</tr>
				<tr>
					<td>Country:</td>
					<td>'. strip_tags( $country ) .'</td>
				</tr>
				<tr>
					<td>State:</td>
					<td>'. strip_tags( $state ) .'</td>
				</tr>
				<tr>
					<td>City:</td>
					<td>'. strip_tags( $city ) .'</td>
				</tr>
				<tr>
					<td>Message:</td>
					<td>'. strip_tags( $_POST['buy_message'] ) .'</td>
				</tr>
			</table>
			<h4>Publish user info</h4>
			ID: '. $user->user_id .'<br />
			Name: '. $user->name .'<br />
			Email: '. $user->email .'<br />
		';

		$headers = 'From: Mag+ buy <no-reply@magplus.com>' . "\r\n";
		add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));

		$mail = wp_mail('sales@magplus.com', 'Buy '. $prod, $message, $headers);
		
		$msg = '<h1>Thank you for your order.</h1>'.
		       '<p>One of our sales rep. will contact you within 24 hours (weekdays).</p>';

		$args = array(
			'link' => 'http://magpl.us/JepOzi',
			'name' => 'I just bought Mag+ to publish my app',
			'caption' => 'It\'s a software for creating smartphone & tablet apps.',
			'description' => 'Easy to use & free to try. Will you?',
			'class' => 'facebook-share-icon',
			'track' => 'fb_share_after_download'
		);
		$msg .= ps_share_button( $args );
		$args = array(
			'type' => 'twitter',
			'link' => 'http://magpl.us/KEwT0o',
			'share_text' => 'I just bought Mag+ to create my app and don\'t need to know anything about coding. It\'s easy and free to try.',
			'twitter_count' => 'none',
			'twitter_via' => ''
		);

		$msg .= ps_share_button( $args );

		$out = array( 'success' => true, 'mail' => $mail, 'msg' => $msg );
	else:
		$out = array( 'errors' => $errors );
	endif;

	echo json_encode( $out );
	die();
}




function get_user_country_by_ip(){
	// get location from cookie
	if(isset($_COOKIE['mag_fp'])){
	  //  return stripslashes($_COOKIE['mag_fp']);
	}

	// else get the data from api
	if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
		$ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}elseif ( isset($_SERVER["HTTP_CLIENT_IP"]) ){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}elseif ( isset($_SERVER["REMOTE_ADDR"]) ){
		$ip = $_SERVER["REMOTE_ADDR"];
	} elseif ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ){
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	// if on local machine
	if( $ip == '127.0.0.1' ) $ip = '173.3.75.186'; //For testing ip with ' in name: $ip = '199.164.68.214';

	// initiate curl and set options
	$ch = curl_init();


	if(!isset($_COOKIE['mag_fp']) || ($_COOKIE['mag_fp_ip'] !== $ip)){

		$apiCall = "https://api.ipinfodb.com/v3/ip-city/?key=b5be7dd42a36ee172c8b05e5432ea1fa8e3fb4d6277d78d7e24936aa6b9b40d5&ip=".$ip."&format=json";
		curl_setopt($ch, CURLOPT_URL, $apiCall);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_HEADER, false);

		$data = curl_exec($ch);

		$data = str_replace("'", " ", $data);
		$headers = curl_getinfo($ch);

		curl_close($ch);

		setcookie('mag_fp', $data, time()+3600, "/");
		setcookie('mag_fp_ip', $ip, time()+3600, "/");

		return $data;
	
	}
	else{
		return stripslashes($_COOKIE['mag_fp']);
	}
		//echo $apiCall;
		//print_r ($_COOKIE['mag_fp']);
		//echo stripslashes($_COOKIE['mag_fp']);
		return stripslashes($_COOKIE['mag_fp']);
		//return $data;
	
}
/**
 * Get the country phone code by country
 *
 * @param string
 */
function country_number_codes( $key = false ){
	$codes = array(
		'AD' => '376',
		'AE' => '971',
		'AF' => '93',
		'AG' => '1268',
		'AI' => '1264',
		'AL' => '355',
		'AM' => '374',
		'AN' => '599',
		'AO' => '244',
		//'AQ' => '672', no flag
		'AR' => '54',
		'AS' => '1684',
		'AT' => '43',
		'AU' => '61',
		'AW' => '297',
		'AZ' => '994',
		'BA' => '387',
		'BB' => '1246',
		'BD' => '880',
		'BE' => '32',
		'BF' => '226',
		'BG' => '359',
		'BH' => '973',
		'BI' => '257',
		'BJ' => '229',
		//'BL' => '590',
		'BM' => '1441',
		'BN' => '673',
		'BO' => '591',
		'BR' => '55',
		'BS' => '1242',
		'BT' => '975',
		'BW' => '267',
		'BY' => '375',
		'BZ' => '501',
		'CA' => '1',
		//'CC' => '61',
		'CD' => '243',
		'CF' => '236',
		'CG' => '242',
		'CH' => '41',
		'CI' => '225',
		'CK' => '682',
		'CL' => '56',
		'CM' => '237',
		'CN' => '86',
		'CO' => '57',
		'CR' => '506',
		'CU' => '53',
		'CV' => '238',
		//'CX' => '61',
		'CY' => '357',
		'CZ' => '420',
		'DE' => '49',
		'DJ' => '253',
		'DK' => '45',
		'DM' => '1767',
		'DO' => '1809',
		'DZ' => '213',
		'EC' => '593',
		'EE' => '372',
		'EG' => '20',
		'ER' => '291',
		'ES' => '34',
		'ET' => '251',
		'FI' => '358',
		'FJ' => '679',
		'FK' => '500',
		'FM' => '691',
		'FO' => '298',
		'FR' => '33',
		'GA' => '241',
		'GB' => '44',
		'GD' => '1473',
		'GE' => '995',
		'GH' => '233',
		'GI' => '350',
		'GL' => '299',
		'GM' => '220',
		'GN' => '224',
		'GQ' => '240',
		'GR' => '30',
		'GT' => '502',
		'GU' => '1671',
		'GW' => '245',
		'GY' => '592',
		'HK' => '852',
		'HN' => '504',
		'HR' => '385',
		'HT' => '509',
		'HU' => '36',
		'ID' => '62',
		'IE' => '353',
		'IL' => '972',
		//'IM' => '44',
		'IN' => '91',
		'IQ' => '964',
		'IR' => '98',
		'IS' => '354',
		'IT' => '39',
		'JM' => '1876',
		'JO' => '962',
		'JP' => '81',
		'KE' => '254',
		'KG' => '996',
		'KH' => '855',
		'KI' => '686',
		'KM' => '269',
		'KN' => '1869',
		'KP' => '850',
		'KR' => '82',
		'KW' => '965',
		'KY' => '1345',
		'KZ' => '7',
		'LA' => '856',
		'LB' => '961',
		'LC' => '1758',
		'LI' => '423',
		'LK' => '94',
		'LR' => '231',
		'LS' => '266',
		'LT' => '370',
		'LU' => '352',
		'LV' => '371',
		'LY' => '218',
		'MA' => '212',
		'MC' => '377',
		'MD' => '373',
		'ME' => '382',
		//'MF' => '1599',
		'MG' => '261',
		'MH' => '692',
		'MK' => '389',
		'ML' => '223',
		'MM' => '95',
		'MN' => '976',
		'MO' => '853',
		'MP' => '1670',
		'MR' => '222',
		'MS' => '1664',
		'MT' => '356',
		'MU' => '230',
		'MV' => '960',
		'MW' => '265',
		'MX' => '52',
		'MY' => '60',
		'MZ' => '258',
		'NA' => '264',
		'NC' => '687',
		'NE' => '227',
		'NG' => '234',
		'NI' => '505',
		'NL' => '31',
		'NO' => '47',
		'NP' => '977',
		'NR' => '674',
		'NU' => '683',
		'NZ' => '64',
		'OM' => '968',
		'PA' => '507',
		'PE' => '51',
		'PF' => '689',
		'PG' => '675',
		'PH' => '63',
		'PK' => '92',
		'PL' => '48',
		'PM' => '508',
		'PN' => '870',
		'PR' => '1',
		'PT' => '351',
		'PW' => '680',
		'PY' => '595',
		'QA' => '974',
		'RO' => '40',
		'RS' => '381',
		'RU' => '7',
		'RW' => '250',
		'SA' => '966',
		'SB' => '677',
		'SC' => '248',
		'SD' => '249',
		'SE' => '46',
		'SG' => '65',
		'SH' => '290',
		'SI' => '386',
		'SK' => '421',
		'SL' => '232',
		'SM' => '378',
		'SN' => '221',
		'SO' => '252',
		'SR' => '597',
		'ST' => '239',
		'SV' => '503',
		'SY' => '963',
		'SZ' => '268',
		'TC' => '1649',
		'TD' => '235',
		'TG' => '228',
		'TH' => '66',
		'TJ' => '992',
		'TK' => '690',
		'TL' => '670',
		'TM' => '993',
		'TN' => '216',
		'TO' => '676',
		'TR' => '90',
		'TT' => '1868',
		'TV' => '688',
		'TW' => '886',
		'TZ' => '255',
		'UA' => '380',
		'UG' => '256',
		'US' => '1',
		'UY' => '598',
		'UZ' => '998',
		'VA' => '39',
		'VC' => '1784',
		'VE' => '58',
		'VG' => '1284',
		'VI' => '1340',
		'VN' => '84',
		'VU' => '678',
		'WF' => '681',
		'WS' => '685',
		'YE' => '967',
		'YT' => '262',
		'ZA' => '27',
		'ZM' => '260',
		'ZW' => '263'
	);
	// if the key exist return it else empty
	if( $key ){
		$key = strtoupper($key);
		if(isset( $codes[$key] )){
			return $codes[$key];
		}else{
			return '';
		}
	}
	// if no key is set return the array
	return $codes;
}

function country_list(){
	$country_array = array(
		'DZ'=>'Algeria',
		'AO'=>'Angola',
		'BJ'=>'Benin',
		'BW'=>'Botswana',
		'BF'=>'Burkina Faso',
		'BI'=>'Burundi',
		'CM'=>'Cameroon',
		'CV'=>'Cape Verde',
		'CF'=>'Central African Republic',
		'TD'=>'Chad',
		'KM'=>'Comoros',
		'CD'=>'Congo [DRC]',
		'CG'=>'Congo [Republic]',
		'DJ'=>'Djibouti',
		'EG'=>'Egypt',
		'GQ'=>'Equatorial Guinea',
		'ER'=>'Eritrea',
		'ET'=>'Ethiopia',
		'GA'=>'Gabon',
		'GM'=>'Gambia',
		'GH'=>'Ghana',
		'GN'=>'Guinea',
		'GW'=>'Guinea-Bissau',
		'CI'=>'Ivory Coast',
		'KE'=>'Kenya',
		'LS'=>'Lesotho',
		'LR'=>'Liberia',
		'LY'=>'Libya',
		'MG'=>'Madagascar',
		'MW'=>'Malawi',
		'ML'=>'Mali',
		'MR'=>'Mauritania',
		'MU'=>'Mauritius',
		'YT'=>'Mayotte',
		'MA'=>'Morocco',
		'MZ'=>'Mozambique',
		'NA'=>'Namibia',
		'NE'=>'Niger',
		'NG'=>'Nigeria',
		'RW'=>'Rwanda',
		'RE'=>'Réunion',
		'SH'=>'Saint Helena',
		'SN'=>'Senegal',
		'SC'=>'Seychelles',
		'SL'=>'Sierra Leone',
		'SO'=>'Somalia',
		'ZA'=>'South Africa',
		'SD'=>'Sudan',
		'SZ'=>'Swaziland',
		'ST'=>'São Tomé and Príncipe',
		'TZ'=>'Tanzania',
		'TG'=>'Togo',
		'TN'=>'Tunisia',
		'UG'=>'Uganda',
		'EH'=>'Western Sahara',
		'ZM'=>'Zambia',
		'ZW'=>'Zimbabwe',
		'AQ'=>'Antarctica',
		'BV'=>'Bouvet Island',
		'TF'=>'French Southern Territories',
		'HM'=>'Heard Island and McDonald Island',
		'GS'=>'South Georgia and the South Sandwich Islands',
		'AF'=>'Afghanistan',
		'AM'=>'Armenia',
		'AZ'=>'Azerbaijan',
		'BH'=>'Bahrain',
		'BD'=>'Bangladesh',
		'BT'=>'Bhutan',
		'IO'=>'British Indian Ocean Territory',
		'BN'=>'Brunei',
		'KH'=>'Cambodia',
		'CN'=>'China',
		'CX'=>'Christmas Island',
		'CC'=>'Cocos [Keeling] Islands',
		'GE'=>'Georgia',
		'HK'=>'Hong Kong',
		'IN'=>'India',
		'ID'=>'Indonesia',
		'IR'=>'Iran',
		'IQ'=>'Iraq',
		'IL'=>'Israel',
		'JP'=>'Japan',
		'JO'=>'Jordan',
		'KZ'=>'Kazakhstan',
		'KW'=>'Kuwait',
		'KG'=>'Kyrgyzstan',
		'LA'=>'Laos',
		'LB'=>'Lebanon',
		'MO'=>'Macau',
		'MY'=>'Malaysia',
		'MV'=>'Maldives',
		'MN'=>'Mongolia',
		'MM'=>'Myanmar [Burma]',
		'NP'=>'Nepal',
		'KP'=>'North Korea',
		'OM'=>'Oman',
		'PK'=>'Pakistan',
		'PS'=>'Palestinian Territories',
		'PH'=>'Philippines',
		'QA'=>'Qatar',
		'SA'=>'Saudi Arabia',
		'SG'=>'Singapore',
		'KR'=>'South Korea',
		'LK'=>'Sri Lanka',
		'SY'=>'Syria',
		'TW'=>'Taiwan',
		'TJ'=>'Tajikistan',
		'TH'=>'Thailand',
		'TR'=>'Turkey',
		'TM'=>'Turkmenistan',
		'AE'=>'United Arab Emirates',
		'UZ'=>'Uzbekistan',
		'VN'=>'Vietnam',
		'YE'=>'Yemen',
		'AL'=>'Albania',
		'AD'=>'Andorra',
		'AT'=>'Austria',
		'BY'=>'Belarus',
		'BE'=>'Belgium',
		'BA'=>'Bosnia and Herzegovina',
		'BG'=>'Bulgaria',
		'HR'=>'Croatia',
		'CY'=>'Cyprus',
		'CZ'=>'Czech Republic',
		'DK'=>'Denmark',
		'EE'=>'Estonia',
		'FO'=>'Faroe Islands',
		'FI'=>'Finland',
		'FR'=>'France',
		'DE'=>'Germany',
		'GI'=>'Gibraltar',
		'GR'=>'Greece',
		'GG'=>'Guernsey',
		'HU'=>'Hungary',
		'IS'=>'Iceland',
		'IE'=>'Ireland',
		'IM'=>'Isle of Man',
		'IT'=>'Italy',
		'JE'=>'Jersey',
		'XK'=>'Kosovo',
		'LV'=>'Latvia',
		'LI'=>'Liechtenstein',
		'LT'=>'Lithuania',
		'LU'=>'Luxembourg',
		'MK'=>'Macedonia',
		'MT'=>'Malta',
		'MD'=>'Moldova',
		'MC'=>'Monaco',
		'ME'=>'Montenegro',
		'NL'=>'Netherlands',
		'NO'=>'Norway',
		'PL'=>'Poland',
		'PT'=>'Portugal',
		'RO'=>'Romania',
		'RU'=>'Russia',
		'SM'=>'San Marino',
		'RS'=>'Serbia',
		'CS'=>'Serbia and Montenegro',
		'SK'=>'Slovakia',
		'SI'=>'Slovenia',
		'ES'=>'Spain',
		'SJ'=>'Svalbard and Jan Mayen',
		'SE'=>'Sweden',
		'CH'=>'Switzerland',
		'UA'=>'Ukraine',
		'GB'=>'United Kingdom',
		'VA'=>'Vatican City',
		'AX'=>'Åland Islands',
		'AI'=>'Anguilla',
		'AG'=>'Antigua and Barbuda',
		'AW'=>'Aruba',
		'BS'=>'Bahamas',
		'BB'=>'Barbados',
		'BZ'=>'Belize',
		'BM'=>'Bermuda',
		'BQ'=>'Bonaire, Saint Eustatius and Saba',
		'VG'=>'British Virgin Islands',
		'CA'=>'Canada',
		'KY'=>'Cayman Islands',
		'CR'=>'Costa Rica',
		'CU'=>'Cuba',
		'CW'=>'Curacao',
		'DM'=>'Dominica',
		'DO'=>'Dominican Republic',
		'SV'=>'El Salvador',
		'GL'=>'Greenland',
		'GD'=>'Grenada',
		'GP'=>'Guadeloupe',
		'GT'=>'Guatemala',
		'HT'=>'Haiti',
		'HN'=>'Honduras',
		'JM'=>'Jamaica',
		'MQ'=>'Martinique',
		'MX'=>'Mexico',
		'MS'=>'Montserrat',
		'AN'=>'Netherlands Antilles',
		'NI'=>'Nicaragua',
		'PA'=>'Panama',
		'PR'=>'Puerto Rico',
		'BL'=>'Saint Barthélemy',
		'KN'=>'Saint Kitts and Nevis',
		'LC'=>'Saint Lucia',
		'MF'=>'Saint Martin',
		'PM'=>'Saint Pierre and Miquelon',
		'VC'=>'Saint Vincent and the Grenadines',
		'SX'=>'Sint Maarten',
		'TT'=>'Trinidad and Tobago',
		'TC'=>'Turks and Caicos Islands',
		'VI'=>'U.S. Virgin Islands',
		'US'=>'United States',
		'AR'=>'Argentina',
		'BO'=>'Bolivia',
		'BR'=>'Brazil',
		'CL'=>'Chile',
		'CO'=>'Colombia',
		'EC'=>'Ecuador',
		'FK'=>'Falkland Islands',
		'GF'=>'French Guiana',
		'GY'=>'Guyana',
		'PY'=>'Paraguay',
		'PE'=>'Peru',
		'SR'=>'Suriname',
		'UY'=>'Uruguay',
		'VE'=>'Venezuela',
		'AS'=>'American Samoa',
		'AU'=>'Australia',
		'CK'=>'Cook Islands',
		'TL'=>'East Timor',
		'FJ'=>'Fiji',
		'PF'=>'French Polynesia',
		'GU'=>'Guam',
		'KI'=>'Kiribati',
		'MH'=>'Marshall Islands',
		'FM'=>'Micronesia',
		'NR'=>'Nauru',
		'NC'=>'New Caledonia',
		'NZ'=>'New Zealand',
		'NU'=>'Niue',
		'NF'=>'Norfolk Island',
		'MP'=>'Northern Mariana Islands',
		'PW'=>'Palau',
		'PG'=>'Papua New Guinea',
		'PN'=>'Pitcairn Islands',
		'WS'=>'Samoa',
		'SB'=>'Solomon Islands',
		'TK'=>'Tokelau',
		'TO'=>'Tonga',
		'TV'=>'Tuvalu',
		'UM'=>'U.S. Minor Outlying Islands',
		'VU'=>'Vanuatu',
		'WF'=>'Wallis and Futuna'
	);
	return $country_array;
}
