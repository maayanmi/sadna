<!DOCTYPE html>
<?php
session_start();
 $email=$_SESSION["email"];
 $pic=$_SESSION["picture"];
?>
<html lang="en">
  <head>
        <title>Home Page</title>
        <link rel="icon" href="../homePage/logo.png">
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <!-- Header and Footer bootstrap css -->
      
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!-- Sidenav bootstrap css -->
      
      <!--Meain menu bootstrap css-->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!--Meain menu bootstrap css-->
      
      <!-- Bootstrap Footer Social icons -->
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://assets/css/Footer-with-social-icons.css">
      <!--/ Bootstrap Footer Social icons -->
      
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
      <link rel="stylesheet" href="homePage.css" >
      <link href="http://fonts.googleapis.com/css?family=Arimo:400" rel="stylesheet">

  </head>
  <body>
	<header>       
            <img id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
            <a href = "homePage.html"><img id ="logo" src = "logo.png" title = "Home Page"></a>
            <a href = "homePage.html"><img id ="home" src = "home.png" title = "Home Page"></a>
            <a href = "../logInPage/logInPage.php?out=1"><img id ="logOut" src = "logOut.png" title = "Logout"></a>
    </header>
      <main>
        <div class = "main">
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

            <ul>
                <li><a href= "../employeesPage/employeesMenu.php"><div class="menu_a btn from-top">Employees</div></a></li>
                <li><a href= "../jobList/jobMenu.PHP"><div class="menu_a btn from-top">Managing Jobs</div></a></li>
                <li><a href= "../employeesEnquiries/empEnquiryList.php"><div class="menu_a btn from-top">Employees Enquiries</div></a></li>
                <li><a href= "../evaluation/evaluationStatus.php"><div class="menu_a btn from-top">Evaluations</div></a></li>
            </ul>
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
         <span> <img id= "algoSec" src = "AlgoSec.png"> </span>
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