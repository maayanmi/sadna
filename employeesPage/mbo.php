<!DOCTYPE html>
<?php session_start();
 $email=$_SESSION["email"];
 $permission = $_SESSION["permission"];
 $pic=$_SESSION["picture"];
 ?>
<html>
    <head>
        <title>MBO</title>
        <link rel="icon" href="../homePage/logo.png">
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
       <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!-- Sidenav bootstrap css -->
      
      <!-- Bootstrap Footer Social icons -->
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="http://assets/css/Footer-with-social-icons.css">
      <!--/ Bootstrap Footer Social icons -->
        
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="mboStyle.css" >
    </head>
    
    <body>
        <header>       
            <img   id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
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
                    <li><a href="../emloyeesEnquiries/empEnquiryList.php">Employees Enquiries</a></li>
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
                        <h3>Managers Entitled To Receive MBO Bonus</h3>
                         <div class="col-md-2 col-sm-2 col-xs-3"></div>
                         <div class="col-md-2 col-sm-2 col-xs-3"></div>
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

                            $sql = "SELECT * FROM employee
                                    WHERE name IN (	SELECT manager
                                                    FROM `employee`
                                                    WHERE salary < 20000 AND DATEDIFF(start_date,CURDATE())
                                                    GROUP BY manager
                                                    HAVING COUNT(id) > 3 )";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo '<table>
                                        <tr>
                                         <th>Name </th>
                                         <th>Job </th>
                                         <th>Department </th>
                                        </tr>';
                                         // output data of each row 

                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["job"]. "</td><td>" . $row["department"]. "</td></tr>"; 
                                }
                                echo "</table>";

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
                    <img src="bonus_2.png" alt="bonus" id="bonus">
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