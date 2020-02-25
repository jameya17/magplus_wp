<?php 
//echo "<pre>";print_r($_REQUEST); 


if(isset($_REQUEST['error_code']) && ($_REQUEST['error_code']=='200')){
	header('Location: https://www.magplus.com/signup/');
}
if(isset($_REQUEST['code'])){
	header('Location: view.php');
}


if (!session_id()) {
    @session_start();
}
date_default_timezone_set('Asia/Kolkata'); 

require_once 'config.php';
if(isset($_REQUEST['code'])){
	header('Location: authenticate.php');
}
############ Set Fb access token ############
if(isset($_SESSION['fb_token'])){
		$facebook->setDefaultAccessToken($_SESSION['fb_token']);
}
else{
	$_SESSION['fb_token'] = (string) $accessToken;
	$oAuth2Client = $facebook->getOAuth2Client();
	$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['fb_token']);
	$_SESSION['fb_token'] = (string) $longLivedAccessToken;
	$facebook->setDefaultAccessToken($_SESSION['fb_token']);
}


############ Fetch data from graph api  ############
try {
	$profileRequest = $facebook->get('/me?fields=name,first_name,last_name,email,link,gender,locale,birthday,cover,picture.type(large)');
	$fbuserData = $profileRequest->getGraphNode()->asArray();
} catch(FacebookResponseException $e) {
	echo 'Graph returned an error: ' . $e->getMessage();
	session_destroy();
	header("Location: ./");
	exit;
} catch(FacebookSDKException $e) {
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	session_destroy();
	header("Location: ./");
	exit;
}
############ Store data in database  ############
//$oauthpro = "facebook";
$id = $fbuserData['id'];// ?? '';
$name = $fbuserData['first_name'];// ?? '';
$l_name = $fbuserData['last_name'];// ?? '';
//$gender = $fbuserData['gender'];// ?? '';
$email = $fbuserData['email'];// ?? '';
//$locale = $fbuserData['locale'];// ?? '';
//$cover = $fbuserData['cover']['source'];// ?? '';
//$picture = $fbuserData['picture']['url'];// ?? '';
//$url = $fbuserData['link'];// ?? '';
$fullname = $name ." ". $l_name;
$platform = "facebook";
$sql = "SELECT * FROM users WHERE email='".$fbuserData['email']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   $conn->query("update users set name='".$fullname."', email='".$email."', platform='".$platform."' where email='".$email."' ");
} else {
	$conn->query("INSERT INTO `users`(`id`, `name`, `email`, `platform`) VALUES ('".$id."', '".$fullname."', '".$email."', '".$platform."')");  
}
$res = $conn->query($sql);
$userData = $res->fetch_assoc();

$_SESSION['userData'] = $userData;
header("Location: view.php");
?>