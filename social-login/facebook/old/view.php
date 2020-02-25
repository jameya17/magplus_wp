<?php 
session_start();
if(!isset($_SESSION['userData'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>TEST </title>
	
</head>
<body>
	<img src="<?= $_SESSION['userData']['cover'] ?>" class="cover" > 
    <img src="<?= $_SESSION['userData']['picture'] ?>" class="profile_pic" >
	<!--<h3>User: <?= $_SESSION['userData']['f_name']." ".$_SESSION['userData']['l_name'] ?></h3>-->
	<p> First Name: <?= $_SESSION['userData']['f_name'] ?></p>
	<p> Last Name: <?= $_SESSION['userData']['l_name'] ?></p>
	<p>Email: <?= $_SESSION['userData']['email_id'] ?></p>
	<p><a class="clor" href="logout.php">Logout</a></p>
	
	

</body>
</html>