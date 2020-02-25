<?php
/* if(isset($_REQUEST['code'])){
	header('Location: view.php');
} */

@session_start();
session_destroy();

require_once 'config.php';
/* if(isset($_SESSION['userData'])){
	header('Location: authenticate.php');
} */
$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);



$wecho = htmlspecialchars ($loginURL);
//echo $wecho;
//die;


//header $wecho;
//header("Location: $wecho");



?>
<script>
var url = '<?php echo $loginURL; ?>'
window.location.href=url;
//debugger;
</script>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>mag+</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
			<!--<a href="<?= htmlspecialchars( $loginURL ); ?>"><img src="assets/image/loginfacebook.png" class="fbbutton" alt="Login With Facebook"></a>-->
	
</body>
</html>