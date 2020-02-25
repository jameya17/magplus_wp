<?php
//die("Please stop");
//session_start();
// although 2nd and 3rd line is not needed session_destroy() is needed,
// but just to be extra sure that no session remains in the cache.
//$_SESSION = array();
//unset($_SESSION);
//session_destroy();


$cookie_name  = 'magplus_session';
// Delete a cookie,
setcookie($cookie_name, '' , time() - 3600, "/"); //  time() - 3600 means, set the cookie expiration date to the past hour.
/* die("Hello PHP");
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
 */
//echo "<pre>ABCD";print_r ($_COOKIES);die;


echo "ok";

//setcookie ("magplus_session", false, time() - 3600, '/', '.magplus.com');



//header("location:https://login.magplus.com/logout");
?>