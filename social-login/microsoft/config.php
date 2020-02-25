<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'microsoft-windows-live');

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


define("CLIENT_ID", "0000000044310E27");
define("SECRET_KEY", "znqpnXP354$:%ryNPJMY05-");
/* make sure the url end with a trailing slash, give your site URL */
define("SITE_URL", "https://www.magplus.com/social-login/microsoft/");
/* the page where you will be redirected for authorization */
//define("REDIRECT_URL", "https://dev.magplus.com/ss/login-system-microsoft-windows-live/");
define("REDIRECT_URL", SITE_URL."live_login.php");
//define("REDIRECT_URL", SITE_URL."https://www.magplus.com/social-login/microsoft/live_login.php");
//https://www.magplus.com/social-login/microsoft/live_login.php
/* Set the scope */
define("SCOPE", 'wl.basic wl.emails' );

define("LOGOUT_URL", SITE_URL."logout.php");


?>