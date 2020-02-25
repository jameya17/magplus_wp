<?php
/* $servername = "mpsdb.c3qvo1sfms4s.us-east-1.rds.amazonaws.com";
$username = "beta.magplus";
$password = "RDXGgn@321$";
$dbname = "beta_magplus"; */


$servername = "mpsdb.c3qvo1sfms4s.us-east-1.rds.amazonaws.com";
$username = "552879_prod";
$password = "T7pDdHXBPz2D$";
$dbname = "552879_production";


//define('DB_DRIVER', 'mysql');
//define('DB_SERVER', 'mpsdb.c3qvo1sfms4s.us-east-1.rds.amazonaws.com');
//define('DB_SERVER_USERNAME', 'beta.magplus');
//define('DB_SERVER_PASSWORD', 'RDXGgn@321$');
//define('DB_DATABASE', 'beta_magplus');



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record


//$sql = "DELETE FROM users WHERE email='nitesh.gandotra@gmail.com'";
//$sql = "DELETE FROM users WHERE email='rahulsaxena.indian@gmail.com'";
//$sql = "DELETE FROM users WHERE email='munam@magplus.com'";
//$sql = "DELETE FROM users WHERE email='shobhnatj@magplus.com'";
//$sql = "DELETE FROM users WHERE email='som0some@gmail.com'";
//$sql = "DELETE FROM users WHERE email='nitesh@magplus.com'";
$sql = "DELETE FROM users WHERE email='amitesh10may@gmail.com'";
//$sql = "DELETE FROM users WHERE email='amitesh@magplus.com'";
// $sql = "DELETE FROM users WHERE email='atamunam@gmail.com'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>