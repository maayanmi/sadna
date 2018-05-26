<!DOCTYPE html>

<html>
    <?php 
     session_start();
                
    $id_row = $_GET["job_num"] ;
    $email=$_SESSION["email"];
    $permission = $_SESSION["permission"];
    $pic=$_SESSION["picture"];
    
    ?>
        

<html>
    <head>
    <img   id ="emp_pic" src='<?php echo $pic ?>' style=' border-radius: 50%;'>
    <link rel="icon" href="../homePage/logo.png">
    <script> var permission = <?php echo $permission ; ?> ; </script>
    <title>Watch A Position</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Header and Footer bootstrap css -->
   <link rel="stylesheet" href="../CSS/headerFooter.css" >

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
    <link rel="stylesheet" href="formWatchingStyle.CSS" >
    <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
    <link rel="stylesheet" href="../homePage/homePage.css" >
    <link rel="stylesheet" href="../employeesPage/newEmployeeStyle.css" >

        
    </head>
    
    <body>
      <header>       
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
                <!-------your main here-------->
                        <form action="" method="post">
                        
                    
                        
                    <?php
                    
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
                            
                        $sql="SELECT job_name, job_type, description, job_requires FROM job WHERE job_number=" . $id_row;
                        $result= $conn->query($sql); 
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<h1>".$row["job_name"]." (".$row["job_type"].")</h1><br>";
                                echo "<h4 style='text-decoration:underline';>Description</h4><br><p>".$row['description']."</p><br>";
                                echo "<h4 style='text-decoration:underline';>Requirements</h4><br><p>".$row['job_requires']."</p>";
                            }
                        }
                        
                         $conn->close();
                    ?>
                          </form>
                          
                          <hr / style="width: 100%">
                         
                        
                    <!---form of uploading cv -->
                        <br><form id ="myForm" action="bla" method="post" enctype="multipart/form-data">
                            Select CV upload (PDF only):
                            <input type="file" name="fileToUpload" id="fileToUpload" style="   color: black;
    border: 1px solid #ccc;
    padding: 6px 12px;
    width: fit-content;
    text-shadow: 0 1px #fff;
    cursor: pointer;
    border-radius: 3px 3px;
    box-shadow: 0 1px #fff inset, 0 1px #ddd;
    background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%)">
                            <input type="text" id="candidate_name" class="form-control" name="candidate_name" style="width: 36.5%; color:black; margin-top: 1%;" placeholder="Enter candidate's name" required>
                            <input type="submit" value="Upload" name="submit" id="uploadButton" style="   color: black;
    border: 1px solid #ccc;
    margin-top: 0.5%;
    padding: 6px 12px;
    width: fit-content;
    text-shadow: 0 1px #fff;
    cursor: pointer;
    border-radius: 3px 3px;
    box-shadow: 0 1px #fff inset, 0 1px #ddd;
    background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%)">
                        </form>
                              
                            
                    <?php
                         echo '<button type="button" class="btn login-button" style="display:none" id="updateButton" onclick="window.location.href=\'../formNewJob/formNew.PHP?is_update=true&job_num=' . $id_row . "'\">Update</button></div>";
                    ?>
                        <script>
              
                if (permission == 1) //for hr manager
                    {
                        $('#updateButton').show(0);
                    }    
          </script>  
                            
                    
                             
                        
                        <script>
                        var job_num = <?php echo $_GET["job_num"] ; ?> ;
                        var path = "upload.php?job_id=" ;
                        document.getElementById("myForm").action = path + job_num;
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