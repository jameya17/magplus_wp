<?php
if( $_POST ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = '<html><body>';
	$message .= '<p>Download your latest copy of Semble <a href="https://magplus-chameleon.s3.amazonaws.com/bin/semble-latest.html">here</a>';
	$message .= '</body></html>';
    $headers = 'From: no-reply@magplus.com' . "\r\n";
    $headers .=	'Reply-To: no-reply@magplus.com' . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	mail($email, "Download Latest Semble Tool", $message, $headers);
}
?>