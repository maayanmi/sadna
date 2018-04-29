<!DOCTYPE html>

<?php session_start();
 $email=$_SESSION["email"];
 $permission = $_SESSION["permission"];
 ?>
<html>
    <head>
        <title>Add new employee</title>
        
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
        <style>
            #success{
                height: 350px;
                font-family: cursive;
                font-size: 24px;
                text-align: center;
            }
        </style>
    </head>
    
    <body>
        <header>       
            <a href = "../homePage/homePage.html"><img id ="logo" src = "../homePage/logo.png" ></a>
            <a href = "../homePage/homePage.html"><img id ="home" src = "../homePage/home.png" ></a>
            <a href = "../logInPage/logInPage.php?out=1"><img id ="logOut" src = "logOut.png" ></a>
            
            <a class="menu-bar" data-toggle="collapse" href="#menu">
                <span class="bars"></span>            
            </a>
        	<div class="collapse menu" id="menu">
                <ul class="list-inline">
                    <li><a href="../employeesPage/employeesMenu.php">Employees</a></li>
                    <li><a href="../jobList/jobMenu.PHP">Managing Jobs</a></li>
                    <li><a href="../emloyeesEnquiries/empEnquiryList.php">Employees Enquiries</a></li>
                    <li><a href="#">Evaluations</a></li>
                </ul>   
        	</div>
        </header>
      
<!-------------MAIN--------------->
        <main>
            <div class="container"  >
                <div class="row main" >
				    <div class="main-login main-center">
                <!-------your main here-------->
                    <div class="col-md-2 col-sm-2 col-xs-3"></div>
                    <div class="col-md-2 col-sm-2 col-xs-3"></div>
                    <div class="col-md-2 col-sm-2 col-xs-3"></div>
                    <div id="success">
                        <?php
                          if ($permission == 1) //for hr manger
                          {
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

                            $name = $_POST['name'];
                            $adress = $_POST['adress'];
                            $phone_number = $_POST['phone_number'];
                            $family_status = $_POST['family_status'];
                            $gender = $_POST['gender'];
                            $job = $_POST['job'];
                            $department = $_POST['department'];
                            $manager = $_POST['manager'];
                            $salary = $_POST['salary'];
                            $start_date = $_POST['start_date'];
                            $email = $_POST['email'];

                             $sql ="INSERT INTO `employee` (`name`, `adress`, `phone`, `family_status`, `gender`, `job`, `department`, `manager`, `salary`, `start_date`, `email`) 
                             VALUES('".$name."', '".$adress."', '".$phone_number."', '".$family_status."', '".$gender."', '".$job."', '".$department."', '".$manager."', '".$salary."', '".$start_date."', '".$email."')";

                            $result = $conn->query($sql);

                            if($result){
                                echo 'Add new employee complete!';
                            }

                            $conn->close();
                          }
                        else//for employee
                        {
                            echo "<script> window.alert ('You have no authorization');
                            window.location='../logInPage/unauthorized.html';
                            </script>";
                        }
                          
                        ?>
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
