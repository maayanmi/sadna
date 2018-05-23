<!DOCTYPE html>
<?php session_start();
 $email=$_SESSION["email"];
 $permission = $_SESSION["permission"];
 $pic=$_SESSION["picture"];
 ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New Employee</title>
        <link rel="icon" href="../homePage/logo.png">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!-- Sidenav bootstrap css -->
      
      <!-- Bootstrap Footer Social icons -->
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://assets/css/Footer-with-social-icons.css">
      <!--/ Bootstrap Footer Social icons -->
    
      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- Header and Footer bootstrap css -->
      <link rel="stylesheet" href="../CSS/headerFooter.css" >


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
    
      <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
      <link rel="stylesheet" href="../homePage/homePage.css" >
      <link rel="stylesheet" href="newEmployeeStyle.css" >
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
				
					<form class="" method="post" action="">
						<h3>Create New Employee</h3>
						<div class="form-group">
							<label for="name" class="cols-sm-2 lables" >Name
                                <span id="req"></span></label>
							<div class="inputs">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name" required>
								</div>
                            </div>

						</div>
                        
                        <div class="form-group">
							<label for="adress" class="cols-sm-2 control-label">Address <span id="req"></span></label>
							<div class="inputs">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input   type="text" class="form-control" name="adress" id="adress" required >
								</div>
							</div>
                                
						</div>
                        
						<div class="form-group">
							<label for="phone_number" class="cols-sm-2 control-label"> Phone Number <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="job name" class="form-control" name="phone_number" id="phone_number" required>
								</div>
							</div>
						</div>                                 
                        
                        <div class="form-group">
                            <label for="family_status">Family Status</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select name="family_status" class="form-control"  id="family_status" required><optgroup label="options">
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Divorced</option>
                                        <option>widower</option> 
                                        </optgroup>
                                    </select>
                                </div>            
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select name="gender" class="form-control"  id="gender" required><optgroup label="options">
                                        <option>Male</option>
                                        <option>Female</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label for="job" class="cols-sm-2 control-label"> Job <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="job name" class="form-control" name="job" id="job" required>
								</div>
							</div>
						</div> 
                        
                        <div class="form-group">
							<label for="department" class="cols-sm-2 control-label"> Department <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="job name" class="form-control" name="department" id="department" required>
								</div>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="manager" class="cols-sm-2 control-label"> Manager <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="job name" class="form-control" name="manager" id="manager" required>
								</div>
							</div>
						</div> 
                        
                        <div class="form-group">
							<label for="salary" class="cols-sm-2 control-label"> Salary <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="number" class="form-control" name="salary" id="salary" required>
								</div>
							</div>
						</div> 
                        
                        <div class="form-group">
							<label for="date" class="cols-sm-2 control-label">Start Date <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="start_date" id="start_date" style="line-height:  13px;" required>
								</div>
							</div>
						</div>                       
                        
                        <div class="form-group">
							<label for="email" class="cols-sm-2 control-label"> Email <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="mail" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
								</div>
							</div>
						</div> 
                        
						<div class="save">
                            <input type="submit" name="submit" id="button" class="btn_save btn btn-primary btn-lg btn-block login-button" value="Save" onClick="validate()">
						</div>
						
					</form>
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

                            if(isset($_POST['submit'])){
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
                                    echo "<script> window.alert ('Add new employee completed!');
                                    window.location='employeesMenu.php';
                                    </script>";
                                }
                                else{
                                    echo "<script> window.alert ('Add new employee not completed!');</script>";
                                }
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