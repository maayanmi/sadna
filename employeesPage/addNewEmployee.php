<!DOCTYPE html>
<html>
    <head>
        <title></title>
        
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
    </head>
    
    <body>
        <header>       
            <img id ="logo" src = "../homePage/logo.png" href = "../homePage/homePage.html">
            <img id ="home" src = "../homePage/home.png" href = "../homePage/homePage.html">
            <img id ="logOut" src = "../homePage/logOut.png" href = "../logInPage/logInPage.php">
        </header>
      
<!-------------MAIN--------------->
        <main>
            <div class="container"  >
                <div class="row main" >
				    <div class="main-login main-center">
                <!-------your main here-------->
                           
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

</html>

