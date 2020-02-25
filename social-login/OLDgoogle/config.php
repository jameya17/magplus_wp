<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'TEST');

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'mpsdb.c3qvo1sfms4s.us-east-1.rds.amazonaws.com');
define('DB_SERVER_USERNAME', '552879_prod');
define('DB_SERVER_PASSWORD', 'T7pDdHXBPz2D$');
define('DB_DATABASE', '552879_production');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

/* make sure the url end with a trailing slash */
define("SITE_URL", "https://www.magplus.com/social-login/google/");
/* the page where you will be redirected for authorzation */
//define("REDIRECT_URL", SITE_URL."google_login.php");
//define("REDIRECT_URL", "https://www.magplus.com/my-magplus/");
define("REDIRECT_URL", SITE_URL."google_login.php");
/* * ***** Google related activities start ** */
//define("CLIENT_ID", "426726555322-2mtsjdejaggmmn6unq7gvt53udlvhsvb.apps.googleusercontent.com"); // BETA
//define("CLIENT_SECRET", "dqFmpfncbiANS5H1KydsSvbh"); // BETA


define("CLIENT_ID", "240605664097-p51k7p5h10novl9qkpmh9obunf86d1vg.apps.googleusercontent.com");
define("CLIENT_SECRET", "6L8tC7HTKYYAr6UX9shDCiMh");

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile' );



/* logout both from google and your site **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."logout.php"));
/* * ***** Google related activities end ** */
?>