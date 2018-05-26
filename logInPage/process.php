<?php


error_reporting(0);
ini_set('display_errors', 0);

$theurl = $_POST["theurl"] ;
$json = file_get_contents($theurl);
$obj = json_decode($json);
$email = $obj->{'email'};
$name = $obj->{'name'};
$pic = $obj->{'picture'};

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
    
session_start();
$_SESSION["email"]=$email;
$_SESSION["name"]=$name;
$_SESSION["permission"]=$permission ;
$_SESSION["picture"]=$pic ;
$conn->close();
 ?>
 
 