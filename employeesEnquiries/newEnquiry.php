<?php 
 session_start();
$email=$_SESSION["email"];
 $pic=$_SESSION["picture"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>New Enquiry</title>
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
        <link rel="stylesheet" href="../employeesPage/EmployeesMenuStyle.css">
          <link rel="stylesheet" href="newEnquiry.css">
         
        
    </head>
    
    <body>
        <header>       
                <img   id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
            <a href = "../homePage/homePage.html"><img id ="logo" src = "../homePage/logo.png" title = "Home Page"></a>
            <a href = "../homePage/homePage.html"><img id ="home" src = "../homePage/home.png" title = "Home Page"></a>
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
            <div class="container">
                <div class="row main" >
				    <div class="main-login main-center">
                <!-------your main here-------->
                        <form action="" method="POST">
                             <h3> New Enquiry</h3>
                        
                        
                            <label for="selection" class="cols-sm-2 lables">Select A Topic
                                  <span id="req"></span></label>
                             <select  name ="subjectEnq" class="form-control">
                              <option>General</option>
                              <option>Labor Laws</option>
                              <option>Paycheck</option>
                              <option>Welfare</option>
                              <option>Personal</option>
                            </select>
                       
                            <br>
                            
                             <label for="content" class="cols-sm-2 lables">Content</label>
                             <textarea  style="display:block;" cols="80" rows="12" name="comment" required></textarea>
                          
                        
                            <br>
                             <div class="search-part">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        
                            </div>
                    
                        </form>
                        
                        <?php
                           if(isset($_POST["comment"])){
                               
                                $subject= $_POST["subjectEnq"];
                                $comment= $_POST["comment"];
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
                            
                                $sql="INSERT INTO enquiry (subject,sender,open_date,description) values ('".$subject."','".$email."','".$date."','".$comment."');";
                                 //$result = $conn->query($sql);
                            
                                // if successfully updated. 
                               if ($conn->query($sql) === TRUE) {
                                       
                                     echo  "<script> window.alert ('Your Enquiry has been received');
                                     window.location='empEnquiryList.php';
                                     </script>";
                                    } 
                                    else {
                                      echo "<script> window.alert ('There was a problem sending your enquiry, Try again later');
                                     window.location='empEnquiryList.php';
                                     </script>";
                                    }
                                    
                                    $conn->close();
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

