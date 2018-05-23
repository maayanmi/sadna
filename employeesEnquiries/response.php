
<!DOCTYPE html>


    <?php 
     session_start();
                
     $id_row = $_GET["id_row"] ;
      $pic=$_SESSION["picture"];
    
    ?>
        

<html>
    <head>
        <title>HR response</title>
        <link rel="icon" href="../homePage/logo.png">
        
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    
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
        <link rel="stylesheet" href="response.css">
         
        
    </head>
    
    <body>
        <header>       
               <img   id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
            <a href = "../homePage/homePage.php"><img id ="logo" src = "../homePage/logo.png" title = "Home Page"></a>
            <a href = "../homePage/homePage.php"><img id ="home" src = "../homePage/home.png" title = "Home Page"></a>
            <a href = "../logInPage/logInPage.php?out=1"><img id ="logOut" src = "../homePage/logOut.png" title = "Logout"></a
            
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
                        <form action="" method="post">
                         <h3> Response</h3>
                            <textarea cols="80%" rows="20" name="comment" required></textarea>
                            <button  id="save" type="submit" class="btn btn-primary">Send</button>
                            <p> </p>
                        </form>
                        
                    <?php
                    
                    if (isset($_POST['comment']) ) {
                        $comment= $_POST['comment'];
                        $date= date("Y-m-d");
                        
                        $servername = "localhost";
                        $database = "maayanmi_hr4u";
                        $username = "maayanmi_eyal";
                        $password = "Aa123";
                        $usertable="enquiry";
                        
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        
                        // Check connection
                        
                        if (!$conn){
                            die("Connection failed: " . mysqli_connect_error());
                        	}
                        
                        $sql="UPDATE enquiry set hr_response=('$comment'),close_date=('$date') where id=('$id_row')";
                        $result= $conn->query($sql); 
                        
                        // if successfully updated. 
                        if(mysqli_affected_rows($conn)){ 
                         
                            echo  "<script> window.alert ('Your response has been received');
                             window.location='../homePage/homePage.html';
                             </script>";
                             
                          
                        }
                        else
                            echo  "<script> window.alert ('Your response have not been accepted, please try later');
                                 window.location='../homePage/homePage.html';
                                 </script>";
                        
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

