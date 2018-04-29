<!DOCTYPE html>
<html>
    <head>
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
            <a href = "../homePage/homePage.html"><img id ="logo" src = "../homePage/logo.png" ></a>
            <a href = "../homePage/homePage.html"><img id ="home" src = "../homePage/home.png" ></a>
            <a href = "../logInPage/logInPage.php"><img id ="logOut" src = "../homePage/logOut.png" ></a>
            
            <a class="menu-bar" data-toggle="collapse" href="#menu">
                <span class="bars"></span>            
            </a>
        	<div class="collapse menu" id="menu">
                <ul class="list-inline">
                    <li><a href="../employeesPage/employeesMenu.php">Employees</a></li>
                    <li><a href="#">Managing Jobs</a></li>
                    <li><a href="../employeesEnquiries/empEnquiryList.php">Employees Enquiries</a></li>
                    <li><a href="#">Evaluations</a></li>
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
								

                                     
									$sql = "SELECT `job_id`,`file`,`sender`,employee.name, job.job_name FROM `CV_upload`,job,employee WHERE job_id=job.job_number AND CV_upload.sender = employee.email";
									$result = $conn->query($sql); 
									

									if ($result->num_rows > 0) { 
									    
									    
									    
										 echo "<div class = 'empty'>
                                                    <table>
                                                      <tr>
                                                        <th>Job Title </th>
                                                        <th>Sender </th>
                                                        <th>File</th>
                                                        
                                                      </tr>
                                             </div>";
										 // output data of each row 
										 
										 while($row = $result->fetch_assoc()) {
										     $job_id = $row["job_id"] ;
											 $path ="uploads/{$job_id}/";
											 $filename =$row["file"] ;
											 
											                                  
                                              echo "<tr><td>" . $row["job_name"]. "</td><td>" . $row["name"]."</td><td>". "<a href='?file={$path}{$filename}' style='color:#001a4d' >". $filename ."</a><br></br>" . "</td></tr>";
											 
											 if (isset($_GET['file'])) {

                                                $file = $_GET["file"];
                                                $name = basename($file) ;
                                                header("Content-type:application/pdf");
                                                
                                                // It will be called downloaded.pdf
                                                header("Content-Disposition:attachment;filename='{$name}'");
                                                
                                                // The PDF source is in original.pdf
                                                readfile("$file");
                                                
                                    
                                      }
											 
											 
											 
											 
										 }
										 echo "</table>";
										 
										 
									} else{
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