<?php
session_start();


$theurl = $_POST["theurl"] ;
$json = file_get_contents($theurl);
$obj = json_decode($json);
$email = $obj->{'email'};
$_SESSION["email"]=$email;


$servername = "localhost";
$database = "maayanmi_hr4u";
$username = "maayanmi_eyal";
$password = "Aa123";
$usertable="permissions";
// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT permission_num FROM $usertable WHERE mail=('$email') limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $permission = $row["permission_num"]; 
    }
  }
else {
        $permission = 0;
    }

echo $permission
 ?>
 
 