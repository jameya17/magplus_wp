<?php

include 'class.IPInfoDB.php';

// Load the class
$ipinfodb = new IPInfoDB('f64cd0dd022586c3806218bc3f9fa3c590b7ce4bbb3862929dd552d4d1c95ebd');

$results = $ipinfodb->getCity($_SERVER['REMOTE_ADDR']);

// Getting the result

if (!empty($results) && is_array($results)) {
	/* foreach ($results as $key => $value) {
		echo $key . ' : ' . $value . "<br>";
	} */
	
	print_r($results); echo '<br>';
	 echo $results[ipAddress]; echo '<br>';
	  echo $results[countryCode]; echo '<br>';
	   echo $results[countryName]; echo '<br>';
	    echo $results[regionName]; echo '<br>';
		 echo $results[cityName]; echo '<br>';
		 echo $results[zipCode]; echo '<br>';
		 
	
}




