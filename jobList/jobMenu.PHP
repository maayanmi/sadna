<!DOCTYPE html>
<html>
    <head>
        <title>Jobs Menu</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        
         <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="jobMenuStyle.CSS">
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
                    <h3>Jobs</h3>
                    <form class="" method="post" action="jobMenu.php">
                                     
                  </form>
                  <div class="col-md-2 col-sm-2 col-xs-3"></div>
                    <?php
                        $servername = "localhost";
                        $database = "maayanmi_hr4u";
                        $username = "maayanmi_eyal";
                        $password = "Aa123";
                        $usertable="enquiry";
                        // Create connection

                        $conn = mysqli_connect($servername, $username, $password, $database);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 

                        if(!empty($job_name) && !empty($department)){
                            $sql = "SELECT * FROM job WHERE department = '".$department."' 
                            AND name LIKE '%".$job_name."%' OR name LIKE '".$job_name."%' OR name LIKE '%".$job_name."'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo '<table>
                                        <tr>
                                         <th>Name </th>
                                         <th>Department </th>
                                        </tr>';
										 // output data of each row 
										 
							    while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td></tr>"; 
								}
								echo "</table>";
										 
							}
							else
								echo "0 results";
                        }
						//if there is only deprtment
                        else if(empty($job_name) && !empty($department)){
                        $sql = "SELECT * FROM job WHERE department = '".$department."'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table>
                                        <tr>
                                         <th>Name </th>
                                         <th>Department </th>
                                        </tr>";
										 // output data of each row 
										 
								while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td></tr>"; 
								}
								echo "</table>";
										 
							}
							else
							    echo "0 results";
                        }
						//if there is only name
                        else if(empty($department) && !empty($job_name)){
                            $sql = "SELECT * FROM job WHERE name LIKE '%".$job_name."%' OR name LIKE '".$job_name."%' OR name LIKE '%".$job_name."'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table>
                                        <tr>
                                         <th>Name </th>
                                         <th>Department </th>
                                        </tr>";
										 // output data of each row 
										 
    							while($row = $result->fetch_assoc()) {
    								echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td></tr>"; 
    							}
    							
    							echo "</table>";
							}
							else
								echo "0 results";
                        }
                        
                        //if both empty
                        else{

                        }
                        $conn->close();
                    ?>
                    
                     <div class="row">
                        <!--div class="col-md-5 col-sm-5 col-xs-5"></div>-->
                        <div class="col-md-2 col-sm-2 col-xs-3"><button type="button" class="btn btn-primary" onclick="window.location.href='form.html'">Create New Job</button></div>
                    </div>
                    
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
