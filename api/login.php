<?php
include_once 'Authentication/JWT.php';
define('ZENDESK_KEY', '5P06fkrRrnTffmSECroO9e56vVe5DoqYxX2dnXdma6bVuICj');

/** Include secrets.php file - one level above the www folder **/
require_once( dirname(dirname(dirname(__FILE__))) . '/www.magplus.com/secrets.php' );

/*
stdClass Object
(
    [user_id] => 25565
    [session_token] => 705b71e3b9c131af9080d16f0937e7ccc4bd657800a3d8acfdd67c035f403c44
    [name] => Patrik Spathon
    [email] => patrik@magplus.com
    [role] => admin
    [expires_at] => 2012-05-04T10:03:46Z
    [version] => 0.1.0
)*/
/**
 * Check if the visitor is logged in to magplus
 */


function magplus_logged_in_check(){
	if(isset($_COOKIE['magplus_session'])){

		// assign the cookie info to data and payload
		$cookie = $_COOKIE['magplus_session'];
		list($data, $payload) = explode('.', $cookie);

		// take the data and hash it with the secret
		$verify = hash('sha256', $data.MAGPLUS_SECRET);

		if($verify == $payload){
			$data = json_decode(base64_decode($data));

			// if the date has expired remove the cookie and set false
			if( time() > strtotime($data->expires_at) ){
				setcookie ("magplus_session", false, time() - 3600, '/', '.magplus.com');
				return false;
			}

			return $data;
		}else{
			// Nice to have: Log that the cookie has been altrered      *** TO DO ***
			setcookie ("magplus_session", false, time() - 3600, '/', '.magplus.com');
			return false;
		}

	}else{
		return false;
	}
}


// Used to redirect user to Zenddesk page after login
$return_to = '';
//if($_GET['return_to']){
//	$return_to='&return_to='.$_GET['return_to'];
//}


$user = magplus_logged_in_check();
// if the user ! is logged in
if( !$user && !$return_to){
	$url = 'https://login.magplus.com/?origin='.
		urlencode('https://www.magplus.com/api/login.php?'. $_SERVER["QUERY_STRING"]);
	header('location: '. $url );
	die();
}

if( !$user && $return_to){
	header('location: '. $_GET['return_to']);
	die();
}

$email_before = explode('@', $user->email);
$sFullName = (!empty($user->name)) ? $user->name : $email_before[0];
$sEmail = $user->email;
$tags = $user->role;
$now = time();

$token = array(
  "jti"   => md5($now . rand()),
  "iat"   => $now,
  "name"  => $sFullName,
  "email" => $sEmail,
  "tags" => array($tags)
);

$jwt = JWT::encode($token, ZENDESK_KEY);

//echo($return_to);
// Redirect
header("Location: https://magplus.zendesk.com/access/jwt?jwt=" . $jwt.$return_to);
die();
?>

