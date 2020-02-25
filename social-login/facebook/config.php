<?php
if(!session_id()) {
    @session_start();
}
error_reporting(E_ALL);
ini_set("display_errors", 1);
//session_start();
##### DB Configuration #####
/* $servername = "localhost";
$username = "root";
$password = "";
$db = "yu";
 */


$servername = "mpsdb.c3qvo1sfms4s.us-east-1.rds.amazonaws.com";
$username = "552879_prod";
$password = "T7pDdHXBPz2D$";
$db = "552879_production";


/* $servername = "mpsdb.c3qvo1sfms4s.us-east-1.rds.amazonaws.com";
$username = "552879_prod";
$password = "T7pDdHXBPz2D$";
$dbname = "552879_production";
 */


$token="";
##### FB App Configuration #####
//$fbappid = "1255396994632458"; 
$fbappid = "1241159719404746"; 
//$fbappsecret = "e565caea19516860664d7aa0fef2fbd9"; 
$fbappsecret = "fda3a9535a22b8843793d84213e141cd"; 
//$redirectURL = "http://localhost:81/LoginwithFb/authenticate.php"; 
$redirectURL = "https://www.magplus.com/social-login/facebook/authenticate.php"; 
$fbPermissions = ['email']; 

##### Create connection #####
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
##### Required Library #####
require_once __DIR__ . '/src/Facebook/autoload.php';
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$facebook = new Facebook(array('app_id' => $fbappid, 'app_secret' => $fbappsecret, 'default_graph_version' => 'v2.10', ));
$helper = $facebook->getRedirectLoginHelper();


##### Check facebook token stored or get new access token #####
try {

	if(isset($_SESSION['fb_token'])){

echo '<pre>'; print_r($_SESSION);die;
		$accessToken = $_SESSION['fb_token'];
	}else{
  		$accessToken = $helper->getAccessToken();
	}
} catch(FacebookResponseException $e) {
 	echo 'Facebook Responser error: ' . $e->getMessage();
  	exit;
} catch(FacebookSDKException $e) {
	echo 'Facebook SDK error: ' . $e->getMessage();
  	exit;
}
?>