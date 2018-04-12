<?php
$servername = "maayanmi.mtacloud.co.il"; //host name
$username = "maayanmi";
$password = "5I7Q#r!};f9b";
$dbname = "maayanmi.mtacloud.co.il_maayanmi_hr4u";// אחרי המספר כותבים קו תחתון ושם הדאטא בייס

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);// התחברות
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    echo "connection failed";
} 


$email_address=$_POST["email_address"];

$sql3="select count(mail) from permissions where mail=".$email_address" 


?>  