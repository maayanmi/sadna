<!DOCTYPE html>
<html>
    <head>
        <title>Jobs Menu</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        
        <!-- Modal -->
<!--
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
-->
    
      <!-- Modal content-->
<!--
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modaltitle" class="modal-title">Job Details:</h4>
        </div>
        <div class="modal-body">
          <p id="modalbody">Some text in the modal. </p>
        </div>
        <div class="modal-footer">
        
        
        
          <button id="b_open" type="button" class="btn btn-primary" style="display: none;">Response</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
-->
      <!----    <script>
              
                if (permission == 1){
                 $('#b_open').show(0);}    
          </script>----->
         
<!--
         <script>
            var job_num;
           
            $("#myModal").on('shown.bs.modal', function () {

                $('#b_open').focus();
                $('#b_open').click(function (event) {
                     window.location="watchingForm.php?job_num="+job_num;
                
                    });
                });
					
        </script>
-->
        
      
<!-------------MAIN--------------->
        <main>
             <div class="container"  >
			 <div class="row main" >
				<div class="main-login main-center">
                    <h3>Jobs</h3>
               
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

                            $sql = "SELECT job_name, department, job_number FROM job";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table>
                                        <tr>
                                         <th>Name </th>
                                         <th>Department </th>
                                         <th>Number </th>
                                         <th>View</th>
                                        </tr>";
										 // output data of each row 
										 
							    while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["job_name"]. "</td><td>" . $row["department"]. "</td><td id='job_".$row["job_number"]."'>" .$row["job_number"]. "</td><td>". "<input id='".$row["job_number"]."' class='update-allocation' type='submit' name='update-allocation' value='Open'data-toggle='modal' data-target='#myModal'></input>". "</td></tr>";
								}
								echo "</table>";
							}
							else
								echo "0 results";
                    
                        $conn->close();
                    ?>
                    

                   <script>
						$(document).ready(function () {
						$('.update-allocation').click(function (event) {
                            
							var job_num = event.target.id;
							 window.location="../formWatchingAPosition/watchingForm.PHP?job_num="+job_num;
                        })
                        });
                                                      
						</script>

                    
                     <div class="create">
                        <!--div class="col-md-5 col-sm-5 col-xs-5"></div>-->
                        <div class="col-md-2 col-sm-2 col-xs-3"><button type="button" class="btn btn-primary" onclick="window.location.href='../formNewJob/formNew.PHP?is_update=false'">Create New Job</button></div>
                    </div>
                    
                      <div class="buttonList">
                        <!--div class="col-md-5 col-sm-5 col-xs-5"></div>-->
                        <div class="col-md-2 col-sm-2 col-xs-3"><button type="button" class="btn btn-primary" onclick="window.location.href='../formWatchingAPosition/list.PHP'">View Candidates</button></div>
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
