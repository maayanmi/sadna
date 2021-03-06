<!DOCTYPE html>
<?php session_start();
 $email=$_SESSION["email"];
 $permission = $_SESSION["permission"];
 $pic=$_SESSION["picture"];
 
 if (isset($_SESSION["permission"])){
     $permission = $_SESSION["permission"];
}

else{
    $permission=0;
}
 
 ?>
<html>
    <head>
        <script>
	    var permission = <?php echo $permission ; ?> ; 
	    if (permission==0)
	    {
	        window.location="../logInPage/logInPage.php";
	    }
	   </script>
   
    <link rel="icon" href="../homePage/logo.png">
    <script> var permission = <?php echo $permission ; ?> ; </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Menu</title>
      
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Header and Footer bootstrap css -->
   <!--<link rel="stylesheet" href="../CSS/headerFooter.css" >-->

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
            <img id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
            <a href = "../homePage/homePage.php"><img id ="logo" src = "../homePage/logo.png" title = "Home Page"></a>
            <a href = "../homePage/homePage.php"><img id ="home" src = "../homePage/home.png" title = "Home Page"></a>
            <a href = "../logInPage/logInPage.php?out=1"><img id ="logOut" src = "../homePage/logOut.png" title = "Logout"></a>
            
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
                    <h3>Jobs</h3>
            
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
                                         <th id='deleteJob' class='deleteJob' style='display:none'>Delete</th>
                                         <th id='publishCol' class='publishCol' style='display:none'>Publish</th>
                                        </tr>";
										 // output data of each row 
										 
							    while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["job_name"]. "</td><td>" . $row["department"]. "</td><td><input id='".$row["job_number"]."' class='update-allocation' type='submit' name='update-allocation' value='Open'data-toggle='modal' data-target='#myModal'></input></td><td id ='jobDelete' class='jobDelete' style='display:none'><input id='delete_".$row["job_number"]."' class='delete-position' value='Delete' type='submit' style='display:none; color:red'></input></td><td id='colPublish' class='colPublish' style='display:none'><input id='publish_".$row["job_number"]."' class='publish-position' style='display:none' type='submit' name='update-allocation' value='Publish' data-toggle='modal' data-target='#myModal'></input></td> </tr>";
							if ($permission==1){
							    echo "<script> $('.publishCol').show(); $('.colPublish').show(); $('.publish-position').show();
                                $('.deleteJob').show(); $('.jobDelete').show(); $('.delete-position').show();
                                </script>";
							}
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
                    
                    <script>
                        $('.delete-position').click (function (event) {
                            var answer = confirm("Are you sure you want to delete?");
                          var job_num = parseInt (event.target.id.split ('_')[1]);
                        if(answer == true){
                            var currentRow = $(this).closest('tr');
                          $.ajax ({
                            type: "POST",
                            url: "../jobList/jobMenu.PHP",
                            data: {
                              job_num: job_num,
                              action: 'delete'
                            }
                          })
                          .done (function () {
                            alert ('Job successfully deleted');
                              currentRow.slideUp(500,function(){
                                currentRow.remove();
                                })
                          })
                          .fail (function () {
                            alert ('Failed to delete!');
                          });
                        }
                          
                        });
                  </script>
                    
                    
                  <?php
            
                        if (isset($_POST['action']) && $_POST['action'] == 'delete')
                        {
                                                      
                            $conn = mysqli_connect($servername, $username, $password, $database);
                        
                            // Check connection

                            if (!$conn){
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $job_num = isset($_POST['job_num']) ? intval($_POST['job_num']) : 0;
                            $sql_3="DELETE from job where job_number=" . $job_num . " LIMIT 1";
                            $result = mysqli_query($conn, $sql_3); 
                        }
                            
                    ?> 

                        <br><button type="button" style="display: none" class="btn btn-primary" id="createJob" onclick="window.location.href='../formNewJob/formNew.PHP?is_update=false'">Create New Job</button>
                         <script>
              
                        if (permission == 1){
                        $('#createJob').show(0);}    
                        </script>
                                     
                        <button type="button" id="view" style="display: none" class="btn btn-primary" onclick="window.location.href='../formWatchingAPosition/list.PHP'">View Candidates</button>
                        <script>
              
                        if (permission == 1){
                        $('#view').show(0);}    
                        </script>
                    
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
