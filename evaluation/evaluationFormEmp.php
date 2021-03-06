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

 ?>
<html>
    <head>
        <title>Employee Evaluation</title>
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
        <link rel="stylesheet" href="evalFormEmp.css">
        
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
                    <li><a href="../employeesEnquiries/empEnquiryList.php">Employees Enquiries</a></li>
                    <li><a href="../evaluation/evaluationStatus.php">Evaluations</a></li>
                </ul>   
        	</div>
        </header>
<!-------------MAIN--------------->
        <main>
            <div class="container">
                <div class="row main">
				    <div class="main-login main-center">
                <!-------your main here-------->
                   <form class="" method="post" action="newEvaluationFormEmp.php">
						<h3>Employee Self Evaluation</h3>
						<div class="form-group">
							<label for="name" class="cols-sm-2 lables" >Write your main goals for the last year:
                                <span id="req"></span></label>
							<div class="inputs">
								<div class="input-group">
									<textarea rows="6" cols="100%" class="form-control" name="goals" id="goals" required></textarea>
								</div>
                            </div>
						</div>
                        
                        <div class="form-group">
							<label for="adress" class="cols-sm-2 control-label">Write the main achievements of the last year: <span id="req"></span></label>
							<div class="inputs">
								<div class="input-group">
									<textarea rows="6" cols="100%" class="form-control" name="achievements" id="achievements" required></textarea>
								</div>
                            </div>      
						</div>
                        
						<div class="form-group">
							<label for="phone_number" class="cols-sm-2 control-label"> Write areas in which you demonstrated your strengths: <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<textarea rows="6" cols="100%" class="form-control" name="strengths" id="strengths" required></textarea>
								</div>
							</div>
						</div>                                 

                        <div class="form-group">
							<label for="job" class="cols-sm-2 control-label"> Write areas in which there is a room for improvement: <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<textarea rows="6" cols="100%" class="form-control" name="improvement" id="improvement" required></textarea>
								</div>
							</div>
						</div> 
                       
						<div class="save">
                            <input type="submit" id="button" name="submit" class="btn_save btn btn-primary btn-lg btn-block login-button" value="Save" onClick="validate()">
						</div>
						
					</form> 
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
             <span> <img id= "algoSec" src = "../homePage/AlgoSec.png" style="height:10%;"> </span>
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