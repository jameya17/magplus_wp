
<style>
p.p_098 {
    color: #000;
    font-size: 14px;
    line-height: 20px;
    margin-block-start: 1px;
    margin-block-end: 1px;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    display: unset;
}

</style>
<?php
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

$sql = "SELECT id, name, email, platform FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//echo "<pre>";print_r($row);die;
        echo "<p class='p_098'>id: " . $row["id"]. " - Name: " . $row["name"]. " - Email " . $row["email"].  " - platform " . $row["platform"]. "</p><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>