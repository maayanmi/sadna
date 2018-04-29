<?php

  $job_num = (int)$_POST ["job_num"];
  
  // Validate job number
  // (should test real number against database)
  if (!$job_num)
  {
    http_response_code (400);
    exit;
  }

    $servername = "localhost";
    $database = "maayanmi_hr4u";
    $username = "maayanmi_eyal";
    $password = "Aa123";
    $usertable="enquiry";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    $department = '';
    $job_requester = '';
    $job_name = '';
    $job_description = '';

    $sql="SELECT job_name, description, job_requester, department FROM job WHERE job_number=" . $job_num;
    $result= $conn->query($sql); 

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $department = $row["department"];
            $job_requester = $row["job_requester"];
            $job_name = $row["job_name"];
            $job_description = $row["description"];
        }
    }
    
    /*$mails= new array();
    $sql_1="SELECT email FROM employee";
    $result= $conn->query($sql_1);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row["email"];
            array_push($mails, email);
            }
    }*/

    $conn->close();

    /*$addressee = implode(",", $mails);*/
    $addressee = 'hr4ualgosec@gmail.com';
    $subject = 'New Position';
    $message = $job_requester. " from " . $department . " department has published a new position - " .$job_name . "\n\nJob's description: \n" . $job_description;
    $headers = 'From: hr4ualgosec@gmail.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
  
  // Send mail
  $success = mail ($addressee, $subject, $message, $headers);
  
  if (!$success)
  {
    http_response_code (400);
    exit;
  }

?>