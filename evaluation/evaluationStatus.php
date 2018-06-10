<!DOCTYPE html>

<?php session_start();
 $email=$_SESSION["email"];
 if (isset($_SESSION["permission"])){
     $permission = $_SESSION["permission"];
}

else{
    $permission=0;
}
 $pic=$_SESSION["picture"];
 $pic=$_SESSION["picture"];
 ?>
 
<html>
    <head>
       <title>Evaluation Status</title>
        <link rel="icon" href="../homePage/logo.png">

	   <script>
	    var permission = <?php echo $permission ; ?> ; 
	    if (permission==0)
	    {
	        window.location="../logInPage/logInPage.php";
	    }
	   </script>        
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
       <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!-- Sidenav bootstrap css -->
      
            <!-- Bootstrap Footer Social icons -->
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://assets/css/Footer-with-social-icons.css">
      <!--/ Bootstrap Footer Social icons -->
        
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
         <link rel="stylesheet" href="evaluationStatus.css">
        
    </head>
    
    <body>
        <header> 
        <img   id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
            <a href = "../homePage/homePage.php"><img id ="logo" src = "../homePage/logo.png" ></a>
            <a href = "../homePage/homePage.php"><img id ="home" src = "../homePage/home.png" ></a>
            <a href = "../logInPage/logInPage.php?out=1"><img id ="logOut" src = "../homePage/logOut.png" ></a>
            
            
            
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
                <!-------your main here-------->
                
                        <h3>Evalution</h3>
                
                
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
								
								// for all users
							        echo "<h4> Your Evaluation Process</h4>";
									$sql1="SELECT name from employee where employee.email=('$email')";
									$result1=$conn->query($sql1); 
									
									$sql = "SELECT evaluation.email FROM evaluation WHERE evaluation.email=('$email') group by email";
									$result = $conn->query($sql); 
									
									
										if ($result1->num_rows > 0) { 
										    
										     while($row = $result1->fetch_assoc()) {
										         
										         $name= $row["name"];
										     }
										}
									
									
										 echo "
                                                    <table>
                                                      <tr>
                                                        <th>Name</th>
                                                        <th>Self Evauation</th>
                                                      </tr>
                                             ";

									if ($result->num_rows > 0) { 
									
										 // output data of each row 
										 
										 while($row = $result->fetch_assoc()) {
										     
						                    echo "<tr><td>" . $name. "</td><td>". "<button id='watchemp'> Watch</button>". "</td></tr>"; 
					
										 }
									}
										 
									
									
									else{
										 echo "<tr><td>" . $name. "</td><td>". "<button id='fillemp'>Fill</button>". "</td></tr>"; 
									    
									}
									
								
									
									 echo "</table>";
									 
									 
									if ($permission == 3) // for manager
									{
									    
                                    $sql2 = "SELECT id,name, b.status FROM(  select id,name,email from employee where manager in (SELECT name from employee where email=('$email')))a LEFT JOIN  (SELECT email, evaluation.status FROM evaluation order by status desc )b on a.email=b.email group by id order by b.status desc";
									$result2 = $conn->query($sql2); 
									
									
									
									
										if ($result2->num_rows > 0) { 
										     echo "<br> <h4> Your Employees Evaluation Process</h4>";
										     echo "
                                                    <table>
                                                      <tr>
                                                        <th>Name</th>
                                                        <th> Employee Evaluation Status</th>
                                                        <th>Manager Evaluation</th>
                                                      </tr>
                                             ";
                                             
                                            while($row = $result2->fetch_assoc()) {
                                                 if ($row['status']== null){
                                                 
                                                    echo "<tr><td>" .  $row['name']. "</td><td>". "<img src='x.png' alt='employee didn't complete his evaluation yet'> ". "</td><td>"  ."</td></tr>"; 
                                                 }
                                                 
                                                 else if ($row['status']== 1){
                                                     echo "<tr><td>" .  $row['name']. "</td><td>". "<img src='v.png' class='v' alt='employee completed his evaluation'>". "</td><td>" ."<button class='evaluate' id='".  $row['id']."'>Fill</button>". "</td></tr>"; 
                                                     
                                                 }
                                                 else {
                                                      echo "<tr><td>" . $row['name']. "</td><td>". "<img src='v.png'  class='v' alt='employee completed his evaluation'>". "</td><td>" ."<button class='watch' id='".  $row['id']."'>Watch</button>". "</td></tr>";
                                                 }
                                             
                                            }
										}
									    
									    else{
									        echo" sorry! couldn't found employees under you ";
									    }
									    
									    
									    
									 echo "</table>";   
									}
									
							if ($permission == 1){ // for hr
							        
                                    $sql = "SELECT employee.id,name,department FROM `evaluation`, employee WHERE employee.email=evaluation.email AND evaluation.status=2";
									$result = $conn->query($sql); 
									
									
										if ($result->num_rows > 0) { 
										     echo "<br> <h4>Employees Who Have Completed Evaluation Process</h4>";
										     echo "
                                                    <table>
                                                      <tr>
                                                        <th>Name</th>
                                                        <th>Department</th>
                                                        <th>Watch</th>
                                                      </tr>
                                             ";
                                             
                                            while($row = $result->fetch_assoc()) {
                                                
                                                   echo "<tr><td>" . $row['name']. "</td><td>" . $row['department']. "</td><td>" ."<button class='watch_hr' id='".  $row['id']."'>Watch</button>". "</td></tr>";
                                            }
                                            
                                        	echo "</table>"; 
										}
										
										else {
										    echo "None Of The Employees Had Finished Evaluation Process";
										}
										
									 
                                    $sql1 = "SELECT name,department,manager,employee.email,evaluation.status from employee left join evaluation on evaluation.email=employee.email where employee.email not in (select email from(SELECT email , MAX(status) as stat FROM evaluation group by email) as a where a.stat=2)";
									$result1 = $conn->query($sql1); 
									
									 	if ($result1->num_rows > 0) { 
										     echo "<br><h4>Employees Who Have NOT Completed Evaluation Process</h4>";
										     echo "
                                                    <table>
                                                      <tr>
                                                        <th>Name</th>
                                                        <th>Department</th>
                                                        <th>Manger</th>
                                                        <th>Evaluation Status</th>
                                                      </tr>
                                             ";
                                             
                                            while($row = $result1->fetch_assoc()) {
                                                
                                                if ($row['status']== null){
                                                
                                                   echo "<tr><td>" . $row['name']. "</td><td>" . $row['department']."</td><td>" . $row['manager'] ."</td><td>". "<img src='red.png' class='status' title='waiting for employee evaluation' 'alt='did not fill employee evaluation'>" ."</td></tr>";
                                                }
                                                
                                                else {
                                                    echo "<tr><td>" . $row['name']. "</td><td>" . $row['department']."</td><td>" . $row['manager'] ."</td><td>". "<img src='yellow.png' class='status' title='waiting for manager evaluation' alt='did not fill manager evaluation'>" ."</td></tr>";
                                                }
                                            }
                                            
                                        	echo "</table>"; 
										}
										
										else
										    echo "All Employees Had Finished Evaluation Process";
									 
									 
							}
							
							
							
							
							$conn->close();
						?>
								
						
								
								                
                        <script>

                            $(document).ready(function () {
						$('#fillemp').click(function (event) {
						     window.location = "evaluationFormEmp.php";
						    
						})});
						
						    $(document).ready(function () {
						$('#watchemp').click(function (event) {
						     window.location = "watchEvaluation_emp.php";
						    
						})});
						
						 $(document).ready(function () {
						$('.watch').click(function (event) {
						    var id_emp = event.target.id;
						  
						     
						      var xhr = new XMLHttpRequest();
                                xhr.open('POST', 'sendEmpId.php');
                                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                xhr.onload = function () {
                                    // do something to response
                                    console.log(this.responseText);
                                     window.location = "watchEvaluation_mang.php";
                                };
                                
                                xhr.send('emp_id_watch=' + id_emp);
						    
						})});
						
						 $(document).ready(function () {
						    $('.evaluate').click(function (event) {
    						    var id_emp = event.target.id;
    						     
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', 'sendEmpId.php');
                                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                xhr.onload = function () {
                                    // do something to response
                                    console.log(this.responseText);
                                      window.location = "evaluationFormMang.php";
                                };
                                
                                xhr.send('emp_id_fill=' + id_emp);
						    
						})});
						
						
						 $(document).ready(function () {
						    $('.watch_hr').click(function (event) {
    						    var id_emp = event.target.id;
    						     
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', 'sendEmpId.php');
                                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                xhr.onload = function () {
                                    // do something to response
                                    console.log(this.responseText);
                                      window.location = "watchEvaluation_mang.php";
                                };
                                
                                xhr.send('emp_id_watch=' + id_emp);
						    
						})});
						
                        </script>
                        
                                    
    
								
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