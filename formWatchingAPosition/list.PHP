<!DOCTYPE html>
<html>
    <head>
        <title>Candidates List</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        
         <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="../jobList/jobMenuStyle.CSS">
    </head>
    <body>
        <header>       
            <img id ="logo" src = "../homePage/logo.png">
            <img id ="home" src = "../homePage/home.png" href = "#">
            <img id ="logOut" src = "../homePage/logOut.png" href = "#">
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
                                                        <th>Job Number </th>
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
											 
											 
											 echo "<tr><td>" . $row["job_id"]. "</td><td>" . $row["job_name"]. "</td><td>" . $row["name"]."</td><td>". "<a href='?file={$path}{$filename}' >". $filename ."</a><br></br>" . "</td></tr>"; 
											 
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
                <div class="footer-right">
                    <div class="footer-company-about">
                         <p><a herf = "#">Managing Job</a></p>
                         <p><a herf = "employeesMenu.html">Employees</a></p>
                         <p><a herf = "#">Employees Enquiries</a></p>
                         <p><a herf = "#">Evaluations</a></p>
                    </div>
                </div>
             <span> <img id= "algoSec" src = "../homePage/AlgoSec.png"> </span>
            </div>
        </footer>
    </body>
</html>