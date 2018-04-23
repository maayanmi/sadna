<?php
$id=$_POST["id_row"];


$servername = "localhost";
$database = "maayanmi_hr4u";
$username = "maayanmi_eyal";
$password = "Aa123";
$usertable="enquiry";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

	die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT description FROM enquiry where id=$id";
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo ($row['description']);
        
    }
  }
  else
    echo "0 results";

?>