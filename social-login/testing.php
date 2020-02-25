<?php







$cookie_name  = 'magplus_session';
// Delete a cookie,
setcookie($cookie_name, '' , time() - 3600, "/"); //  time() - 3600 means, set the cookie expiration date to the past hour.


header("location:https://login.magplus.com/logout");


?>