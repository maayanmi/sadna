<!DOCTYPE html>
<?php 
     session_start();
                
     $is_update = $_GET["is_update"] ;

    if ($is_update == "true"){
        
        $submit_button = "Update";
        $page_title = "Update Job";
    }
    else{
        
        $submit_button = "Save";
        $page_title = "Create New Job";
    }

    
    
    ?>
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
                        <?php
                            echo '<h3 id="mode_title">'.$page_title.'</h3>'
                        ?>
						
						<div class="form-group">
							<label for="The Job requires" class="cols-sm-2 control-label" >The Job requires
                                <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" id="job_requires" class="form-control" name="job_requires" required>
								</div>
                            </div>

						</div>
                        
                        <div class="form-group">
							<label for="Job's creator" class="cols-sm-2 control-label">Job's creator <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" id="job_creator" class="form-control" name="job_creator" required >
								</div>
							</div>
                                
						</div>
                        
						<div class="form-group">
							<label for="position's name" class="cols-sm-2 control-label"> Job's name <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" id="job_name" class="form-control" name="job_name" required>
								</div>
							</div>
						</div>                                                         
                        
                        <div class="form-group">
                            <label for="family_status">Job's type</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select name="job_type" class="form-control"  id="job_type" required><optgroup label="options">
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
									<input type="text" id="job_department" class="form-control" name="job_department" required>
								</div>
							</div>
						</div> 
                        
                        <br>
                        <div class="form-group">
							<label for="date" class="cols-sm-2 control-label">Job's open date <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<input type="date" id="job_open_date" class="form-control" name="job_open_date" required>
								</div>
							</div>
						</div>                               
                             
                        <div class="details">
                            <div><label for="Job's details">Job's details </label>
                                <br><textarea cols="96" name="job_details" id="job_details" rows="4"></textarea>
                            </div>
                        
                            <div><label for="Job requirements">Job requirements</label>
                                <textarea cols="96" name="job_requirements" id="job_requirements" rows="4"></textarea>
                            </div>
                        </div>
                                 
                        <div class="form-group">
                            <label for="family_status">Job Status</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select name="job_status" class="form-control"  id="job_status" required><optgroup label="options">
                                        <option>Approved</option>
                                        <option>Declined</option>
                                    </optgroup>
                                    </select>
                                </div>            
                            </div>
                        </div>
                        
                        <?php
                            echo '<div class="save"><input type="submit" id="button_1" class="btn btn-primary btn-lg btn-block login-button" value=" ' . $submit_button . '"  onClick="validate()"><input type="hidden" name="button_pressed" value="2"> </div>'
                        ?>
                        
                        
                        
                        <?php
            
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

                                $job_name= $_POST["job_name"];
                                $job_requires= $_POST["job_requirements"];
                                $job_creator=$_POST["job_creator"];
                                $job_type=$_POST["job_type"];
                                $department=$_POST["job_department"];
                                $job_open_date=date($_POST["job_open_date"]);
                                $description=$_POST["job_details"];
                                

                                $sql="INSERT INTO job (job_name,job_requires,job_creator, job_type,department,job_open_date,description ) values ('".$job_name."','".$job_requires."','".$job_creator."','".$job_type."','".$department."','".$job_open_date."','".$description."' );";
                                     //$result = $conn->query($sql);
                            
                            
                            // if successfully updated. 
                                   if ($conn->query($sql) === TRUE) {

                                    $addressee      = 'hr4ualgosec@gmail.com';
                                    $subject = 'New Position';
                                    $message = "Hello, a new position has been added to " . $department . " department. You can view it in the job list";
                                    $headers = 'From: hr4ualgosec@gmail.com' . "\r\n" .
                                        'Reply-To: webmaster@example.com' . "\r\n" .
                                        'X-Mailer: PHP/' . phpversion();

                                       mail($addressee, $subject, $message, $headers);
                            
                                         echo  "<script> window.alert ('Your new job has been saved, and sent on mail');
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

<!--
 <script>
                        var job_num = <?php echo $_GET["job_num"] ; ?> ;
                        var path = "upload.php?job_id=" ;
                        document.getElementById("myForm").action = path + job_num;
                        </script>
-->
<script>
    
    var is_update = <?php echo $is_update; ?>;
    if (is_update == true){
        document.getElementById("mode_title").innerHTML = "Update Job";    
    }
    else{
        document.getElementById("mode_title").innerHTML = "Create New Job";    
    }
    
            
</script>