<!DOCTYPE html>
<html>
     <?php 
     session_start();
                
    $pic=$_SESSION["picture"];
    if (isset($_SESSION["permission"])){
     $permission = $_SESSION["permission"];
}

else{
    $permission=0;
}
    
    ?>
    <head>
        <script>
	    var permission = <?php echo $permission ; ?> ; 
	    if (permission==0)
	    {
	        window.location="../logInPage/logInPage.php";
	    }
	   </script>

        <link rel="icon" href="../homePage/logo.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Candidates List</title>
        
    <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Header and Footer bootstrap css -->
    <link rel="stylesheet" href="../CSS/headerFooter.css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
	<!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


        <!-- Google Fonts -->
		  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>   
        <![endif]-->
        
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="../jobList/jobMenuStyle.CSS">
    </head>
    <body>
       <header>
           <img id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
            <a href = "../homePage/homePage.php"><img id ="logo" src = "../homePage/logo.png" title = "Home Page"></a>
            <a href = "../homePage/homePage.php"><img id ="home" src = "../homePage/home.png" title = "Home Page"></a>
            <a href = "../logInPage/logInPage.php"><img id ="logOut" src = "../homePage/logOut.png" title = "Logout"></a>
            
            <a class="menu-bar" data-toggle="collapse" href="#menu">
                <span class="bars"></span>            
            </a>
        	<div class="collapse menu" id="menu">
                <ul class="list-inline">
                    <li><a href="../employeesPage/employeesMenu.php">Employees</a></li>
                    <li><a href="../jobList/jobMenu.PHP">Managing Jobs</a></li>
                    <li><a href="../employeesEnquiries/empEnquiryList.php">Employees Enquiries</a></li>
                    <li><a href="../evaluation/evaluationStatus.php">Evaluations</a></li>
                </ul>   
        	</div>
        </header>
        
<!-------------MAIN--------------->
        <main>
             <div class="container"  >
			 <div class="row main" >
				<div class="main-login main-center">
                    <h3>Candidates List</h3>
               
                  <div class="col-md-2 col-sm-2 col-xs-3"></div>

<?php

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
								
									$sql = "SELECT `job_id`,`file`,`sender` ,candidate_name,employee.name, job.job_name FROM `CV_upload`,job,employee WHERE job_id=job.job_number AND CV_upload.sender = employee.email";
									$result = $conn->query($sql); 
									

									if ($result->num_rows > 0) { 
									    
										 echo "<div class = 'empty'>
                                                    <table>
                                                      <tr>
                                                        <th>Job Title </th>
                                                        <th>Sender </th>
                                                        <th>Candidate's Name</th>
                                                        <th>File</th>
                                                                                                    
                                                      </tr>
                                             </div>";
										 // output data of each row 
										 
										 while($row = $result->fetch_assoc()) {
										     $job_id = $row["job_id"] ;
											 $path ="uploads/{$job_id}/";
											 $filename =$row["file"] ;
											 $candidate_name=$row["candidate_name"];
											 
											                                  
                                              echo "<tr><td>" . $row["job_name"]. "</td><td>" . $row["name"]."</td><td> " . $row["candidate_name"]. " </td><td>". "<a href='download.php?file={$path}{$filename}' style='color:#001a4d' id='file_name'>". $filename ."</a><br></br>" . "</td></tr>";
										 }
									
										 
										 echo "</table>";
									} 
									
									else{
                                        echo "00000";
                                        }







$conn->close();


?>
                    
                </div>
            </div>
            </div>
        </main>
<!------------FOOTER--------------->
   <footer class="footer-distributed">
            <div class="footer-style">
              <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>94 Shlomo Shmeltzer St.,</span> Petach Tikva 4970602, Israel. </p> 
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+972 50 6996868 </p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:help@algoSec.com">Contact Us</a></p>
                </div>
               </div>
             <span> <img id= "algoSec" src = "../homePage/AlgoSec.png"> </span>
            </div>
        </footer>
        <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }  
        </script>
    </body>
</html>



