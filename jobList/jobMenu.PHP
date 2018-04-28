<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Menu</title>
      
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
        <link rel="stylesheet" href="jobMenuStyle.CSS">
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

                            $sql = "SELECT job_name, department, job_number FROM job order by department";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table>
                                        <tr>
                                         <th>Name </th>
                                         <th>Department </th>
                                         <th>View</th>
                                         <th>Publish</th>
                                        </tr>";
										 // output data of each row 
										 
							    while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["job_name"]. "</td><td>" . $row["department"]. "</td><td>". "<input id='".$row["job_number"]."' class='update-allocation' type='submit' name='update-allocation' value='Open'data-toggle='modal' data-target='#myModal'></input>". "</td><td>". "<input id='publish_".$row["job_number"]."' class='publish-position' type='submit' name='update-allocation' value='Publish' data-toggle='modal' data-target='#myModal'></input>". "</td> </tr>";
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
                    
                    <script>
                        $('.publish-position').click (function (event) {

                          var job_num = parseInt (event.target.id.split ('_')[1]);

                          $.ajax ({
                            type: "POST",
                            url: "../formWatchingAPosition/publish.php",
                            data: {
                              job_num: job_num
                            }
                          })
                          .done (function () {
                            alert ('Job published successfully!');
                          })
                          .fail (function () {
                            alert ('Failed publishing job !');
                          });
                        });
                  </script>

                    
                     
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='../formNewJob/formNew.PHP?is_update=false'">Create New Job</button></div>
                        </div>
                    
                         
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <button type="button" id="view" class="btn btn-primary" onclick="window.location.href='../formWatchingAPosition/list.PHP'">View Candidates</button></div>
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
