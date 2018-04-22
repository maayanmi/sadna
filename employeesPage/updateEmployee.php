<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="../employeesPage/EmployeesMenuStyle.css">
    </head>
    
    <body>
        <header>       
            <a href = "../homePage/homePage.html"><img id ="logo" src = "../homePage/logo.png" ></a>
            <a href = "../homePage/homePage.html"><img id ="home" src = "../homePage/home.png" ></a>
            <a href = "../logInPage/logInPage.php"><img id ="logOut" src = "../homePage/logOut.png" ></a>
        </header>
<!-------------MAIN--------------->
        <main>
            <div class="container"  >
                <div class="row main" >
				    <div class="main-login main-center">
                <!-------your main here-------->
                        <?php
                        
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
                        ?>    
                        
                        <?php
                            // Create connection
                            $servername = "localhost";
                            $database = "maayanmi_hr4u";
                            $username = "maayanmi_eyal";
                            $password = "Aa123";
                            $usertable="enquiry";

                            $conn = mysqli_connect($servername, $username, $password, $database);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 

                             $sql ="UPDATE `employee` 
                             SET `name`='".$name."',`adress`='".$adress."',`phone`='".$phone_number."',`family_status`='".$family_status."', `gender`='".$gender."',`job`='".$job."',`department`='".$department."',`manager`='".$manager."',`salary`='".$salary."', `start_date`='".$start_date."',`email`='".$email."' 
                             WHERE `id`='".$id_emp."'";

                            $result = $conn->query($sql);

                            if($result){
                                echo'<h3>Update Employee Complete!</h3>';
                                echo'<form method="post" action="employeesMenu.php"
                                <button type="submit" class="btn btn-primary">Return To Home Page</button>
                                </form>';
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
                         <p><a herf = "#">Employees</a></p>
                         <p><a herf = "#">Employees Enquiries</a></p>
                         <p><a herf = "#">Evaluations</a></p>
                    </div>
                </div>
             <span> <img id= "algoSec" src = "../homePage/AlgoSec.png"> </span>
            </div>
        </footer>
    </body>
</html>