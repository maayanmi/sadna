<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Job</title>
      
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
    <link rel="stylesheet" href="formStyle.CSS">
    <link rel="stylesheet" href="../homePage/homePage.css" >
    <link rel="stylesheet" href="../applyingForJob/applyingStyle.CSS" >
</head>
    
    
  <body>
      <header>       
        <img id ="logo" src = "../homePage/logo.png">
        <img id ="home" src = "../homePage/home.png" href = "#">
        <img id ="logOut" src = "../homePage/logOut.png" href = "#">
    </header>
      
<!-------------MAIN--------------->
        
		<div class="container"  >
			<div class="row main" >
				<div class="main-login main-center">
				
					<form class="" method="post">
						<h3>Creat New Job</h3>
						<div class="form-group">
							<label for="The Job requires" class="cols-sm-2 control-label" >The Job requires
                                <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="request_name" id="request_name" required>
								</div>
                            </div>

						</div>
                        
                        <div class="form-group">
							<label for="Job's creator" class="cols-sm-2 control-label">Job's creator <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input   type="text" class="form-control" name="Job's creator" id="Job's creator" required >
								</div>
							</div>
                                
						</div>
                        
						<div class="form-group">
							<label for="position's name" class="cols-sm-2 control-label"> Job's name <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="Job's name" class="form-control" name="Job's name" id="Job's name" required>
								</div>
							</div>
						</div>                                                         
                        
                        <div class="form-group">
                            <label for="family_status">Job's type</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select name="family_status" class="form-control"  id="family_status" required><optgroup label="options">
                                        <option>Full time job</option>
                                        <option>Part time job</option>
                                    </optgroup>
                                    </select>
                                </div>            
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label for="department" class="cols-sm-2 control-label"> department <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="job name" class="form-control" name="department" id="department" required>
								</div>
							</div>
						</div> 
                        
                        <br>
                        <div class="form-group">
							<label for="date" class="cols-sm-2 control-label">Job's open date <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="Job's open date" id="Job's open date" required>
								</div>
							</div>
						</div>                               
                             
                        <div class="details">
                            <div><label for="Job's details">Job's details </label>
                                <br><textarea cols="96" name="Job's details" rows="4"></textarea>
                            </div>
                        
                            <div><label for="Job requirements">Job requirements</label>
                                <textarea cols="96" name="Job requirements" rows="4"></textarea>
                            </div>
                        </div>
                                 
                        <div class="form-group">
                            <label for="family_status">Job Status</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select name="family_status" class="form-control"  id="family_status" required><optgroup label="options">
                                        <option>Approved</option>
                                        <option>Declined</option>
                                    </optgroup>
                                    </select>
                                </div>            
                            </div>
                        </div>
                        
						<div class="publish">
							<input type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button" value="Publish" onClick="validate()">
                            <input type="hidden" name="button_pressed" value="1" />
						</div>
                        
                        <div class="save">
                            <input type="submit" id="button_1" class="btn btn-primary btn-lg btn-block login-button" value="Save" onClick="validate()">
                            <input type="hidden" name="button_pressed_1" value="2" />
                        </div>
                        
                        
                        <?php
                        
                       /* $servername = "localhost";
                        $database = "maayanmi_hr4u";
                        $username = "maayanmi_eyal";
                        $password = "Aa123";
                        $usertable="enquiry";
                        
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        
                        // Check connection
                        
                        if (!$conn){
                            die("Connection failed: " . mysqli_connect_error());
                        }*/
                        
                        
                        if(isset($_POST['button_pressed']))
                            {
                            
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
                            
                            $addressee = mysqli_real_escape_string($conn, $_POST['addressee']);
                            $subject = mysqli_real_escape_string($conn, $_POST['subject']);
                            $message = mysqli_real_escape_string($conn, $_POST['message']);
                            $headers = mysqli_real_escape_string($conn, $_POST['headers']);
                            
                                    $addressee      = 'hr4ualgosec@gmail.com';
                                    $subject = 'New Position';
                                    $message = 'Hello, a new position has been opened. You can see it in the job list';
                                    $headers = 'From: hr4ualgosec@gmail.com' . "\r\n" .
                                        'Reply-To: webmaster@example.com' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();

                                    mail($addressee, $subject, $message, $headers);
                            
                               
                                     echo  "<script> window.alert ('Your email has been sent');
                                     window.location='../jobList/jobMenu.PHP';
                                     </script>";
                                   
                                      /*echo "<script> window.alert ('There was a problem sending your email, please try again');
                                     window.location='formNew.PHP';
                                     </script>";*/
                                    }

                                    /*echo 'Email Sent.';*/
                                            
                            /*$addressee = mysqli_real_escape_string($conn, $_POST['addressee']);
                            $subject = mysqli_real_escape_string($conn, $_POST['subject']);
                            $message = mysqli_real_escape_string($conn, $_POST['message']);
                            $headers = mysqli_real_escape_string($conn, $_POST['headers']);*/

                          /*$sql = "INSERT INTO email (addressee, subject, message,headers) VALUES ('$addressee', '$subject', '$message','$headers')";

                            if ($conn->query($sql) === TRUE) {
                                       
                                     echo  "<script> window.alert ('Your email has been sent');
                                     window.location='jobMenu.PHP';
                                     </script>";
                                    } 
                                    else {
                                      echo "<script> window.alert ('There was a problem sending your email, please try again');
                                     window.location='formNew.PHP';
                                     </script>";
                                    }*/
                        
                        if(isset($_POST['button_pressed_1']))
                        {
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
                            
                            $job_number= $_POST["Job's number"];
                            $job_name= $_POST["Job's name"];
                            $job_requires= $_POST["The Job requires"];
                            $job_creator=$_POST["Job's creator"];
                            $job_type=$_POST["Job's type"];
                            $department=$_POST["department"];
                            $job_open_date=date("Y-m-d");
                            $description=$_POST["Job's details"];
                            
                            
                            $sql="INSERT INTO job (job_number,job_name,job_requires,job_creator, job_type,department,job_open_date,description ) values ('".$job_number."','".$job_name."','".$job_requires."','".$job_creator."','".$job_type."','".$department."','".$job_open_date."','".$description."' );";
                                 //$result = $conn->query($sql);
                            
                                // if successfully updated. 
                               if ($conn->query($sql) === TRUE) {
                                       
                                     echo  "<script> window.alert ('Your new job has been saved');
                                     window.location='../jobList/jobMenu.PHP';
                                     </script>";
                                    } 
                        }

                        ?>
						
					</form>
				</div>
			</div>
		</div>

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
				<p class="footer-company-about">
                     <p><a herf = "#">Managing Job</a></p>
                     <p><a herf = "../employeesPage/employeesMenu.html">Employees</a></p>
                     <p><a herf = "#">Employees Enquiries</a></p>
                     <p><a herf = "#">Evaluations</a></p>
				</p>
			</div>
         <span> <img id= "algoSec" src = "../homePage/AlgoSec.png"> </span>
        </div>
    </footer>

      
       <!-- Form validation -->
      <script src="../JS/form.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>