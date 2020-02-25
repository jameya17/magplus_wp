<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'test');

/* define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'mpsdb.c3qvo1sfms4s.us-east-1.rds.amazonaws.com');
define('DB_SERVER_USERNAME', 'amitesh.jain');
define('DB_SERVER_PASSWORD', 'MGplus@123D');
define('DB_DATABASE', '552879_dev'); */


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

/* * ***** facebook related activities start ** */
require 'facebook_library/facebook.php';

define("APP_ID", "548104269322862");
define("APP_SECRET", "eec462ab02a6989e63c08f00abea2799");
/* make sure the url end with a trailing slash */
define("SITE_URL", "https://www.magplus.com/social-login/facebooklogin/");
/* the page where you will be redirected after login */
define("REDIRECT_URL", "https://www.magplus.com/social-login/facebooklogin/facebook_login.php");
/* Email permission for fetching emails. */
define("PERMISSIONS", "email");


/*  If database connection is OK, then proceed with facebook * */
// create a facebook object
$facebook = new Facebook(array('appId' => APP_ID, 'secret' => APP_SECRET));
$userID = $facebook->getUser();

// Login or logout url will be needed depending on current user login state.
if ($userID) {
  $logoutURL = $facebook->getLogoutUrl(array('next' => SITE_URL . 'logout.php'));
} else {
  $loginURL = $facebook->getLoginUrl(array('scope' => PERMISSIONS, 'redirect_uri' => REDIRECT_URL));
}
?>