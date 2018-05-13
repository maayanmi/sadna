<!DOCTYPE html>
<?php session_start();
 $email=$_SESSION["email"];
 $permission = $_SESSION["permission"];
 ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HR4U</title>
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
            <a href = "../homePage/homePage.html"><img id ="logo" src = "../homePage/logo.png" ></a>
            <a href = "../homePage/homePage.html"><img id ="home" src = "../homePage/home.png" ></a>
            <a href = "../logInPage/logInPage.php?out=1"><img id ="logOut" src = "../homePage/logOut.png" ></a>
            
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
				
					<form class="" method="post" action="addNewEmployee.php">
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
									<input type="start_date" class="form-control" name="start_date" id="start_date" required>
								</div>
							</div>
						</div>                       
                        
                        <div class="form-group">
							<label for="email" class="cols-sm-2 control-label"> Email <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email" required>
								</div>
							</div>
						</div> 
                        
						<div class="save">
                            <input type="submit" id="button" class="btn_save btn btn-primary btn-lg btn-block login-button" value="Save" onClick="validate()">
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