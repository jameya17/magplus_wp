<?php
session_start();
// although 2nd and 3rd line is not needed session_destroy() is needed,
// but just to be extra sure that no session remains in the cache.
$_SESSION = array();
unset($_SESSION);
//session_destroy();


//$cookie_name  = 'magplus_session';
// Delete a cookie,
//setcookie($cookie_name, '' , time() - 3600, "/"); //  time() - 3600 means, set the cookie expiration date to the past hour.



header("location:https://login.magplus.com/login");
?>