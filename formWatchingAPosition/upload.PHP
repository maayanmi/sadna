<?php
session_start();
//get id from cv table
$job_id2 = $_GET["job_id"];
$job_id = $_GET["job_id"]."/";
$email=$_SESSION["email"];
$target_dir = "uploads/";
$candidate_name =$_POST["candidate_name"];

//create folder based on the job id if not exist
if (!file_exists($target_dir . $job_id)) {
    mkdir($target_dir . $job_id, 0777, true);
}
// path to file
$target_file = $target_dir . $job_id . basename($_FILES["fileToUpload"]["name"]);
//if upload != 1 differnt errors
$uploadOk = 1;
// get file type
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
     echo  "<script> window.alert ('Sorry, file already exists.');
             window.location='../jobList/jobMenu.PHP';
                             
             </script>";
    
    $uploadOk = 0;
}
// Check file size (5 MB)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
     echo  "<script> window.alert ('Sorry, your file is too large.');
             window.location='../jobList/jobMenu.PHP';
                             
             </script>";
    
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "pdf"
 ) {
     echo  "<script> window.alert ('Sorry, only PDF allowed.');
             window.location='../jobList/jobMenu.PHP';
                             
             </script>";
       
    $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo  "<script> window.alert ('Sorry, your file was not uploaded');
            window.location='../jobList/jobMenu.PHP';
                             
             </script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        $file_name = basename( $_FILES["fileToUpload"]["name"]);
                        $servername = "localhost";
                        $database = "maayanmi_hr4u";
                        $username = "maayanmi_eyal";
                        $password = "Aa123";
                        $usertable="CV_upload";
                        
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        
                        // Check connection
                        
                        if (!$conn){
                            die("Connection failed: " . mysqli_connect_error());
                        	}
                        
                        //$sql="INSERT INTO {$usertable} (file,job_id,sender) VALUES (('$file_name'),$job_id2,('$email'))";
                         $sql="INSERT INTO {$usertable} (file,job_id,sender,candidate_name) VALUES (('$file_name'),$job_id2,('$email'), ('$candidate_name'))";
                        $result= $conn->query($sql); 
                        
                        // if successfully updated. 
                        if(mysqli_affected_rows($conn)){ 
                         
                         
                             echo  "<script> window.alert ('Your file has been received');
                             window.location='../jobList/jobMenu.PHP';
                             
                             </script>";
                             
                          
                        }
        
        
    } else {
              echo  "<script> window.alert ('Sorry, there was an error uploading your file.');
                             window.location='../jobList/jobMenu.PHP';
                             
                             </script>";
    }
}
?>