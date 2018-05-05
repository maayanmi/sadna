<!DOCTYPE html>
<?php 
     session_start();
                
     $is_update = $_GET["is_update"];
     $job_num = intval($_GET["job_num"]);

     $job_requester = $row['job_requester'];
     $job_name = '';
     $job_requires = '';
     $job_creator = '';
     $job_type = '';
     $department = '';
     $job_open_date = '';
     $job_status = '';
     $description = '';

    if ($is_update == "true"){
        $submit_button = "Update";
        $page_title = "Update Job";
        
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

            $sql = "SELECT job_name, job_requires, job_creator, job_type, department, job_open_date, description, job_requester, job_status FROM job WHERE job_number=" . $job_num;

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $job_name = $row["job_name"];
                    $job_requires = $row["job_requires"];
                    $job_creator = $row["job_creator"];
                    $job_type = $row["job_type"];
                    $department = $row["department"];
                    $job_open_date = $row["job_open_date"];
                    $description = $row["description"];
                    $job_status = $row["job_status"];
                    $job_requester = $row["job_requester"];
                }
            }
            else
                echo "0 results";

        $conn->close();
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
   <?php echo '<title>' . $page_title . '</title>';
    ?>
      
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
    <link rel="stylesheet" href="../employeesPage/newEmployeeStyle.css" >
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
                    <li><a href="#">Managing Jobs</a></li>
                    <li><a href="../employeesEnquiries/empEnquiryList.php">Employees Enquiries</a></li>
                    <li><a href="#">Evaluations</a></li>
                </ul>   
        	</div>
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
							<label for="The Job requires" class="cols-sm-2 control-label" >Job Requester
                                <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <?php
                                        echo '<input type="text" id="job_requester" class="form-control" name="job_requester" required value="' . $job_requester . '">'; 
                                    ?>
								</div>
                            </div>

						</div>
                        
                        <div class="form-group">
							<label for="Job's creator" class="cols-sm-2 control-label">Job creator <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<?php
                                        echo '<input type="text" id="job_creator" class="form-control" name="job_creator" required value="' . $job_creator . '">';
                                    ?>
								</div>
							</div>
                                
						</div>
                        
						<div class="form-group">
							<label for="position's name" class="cols-sm-2 control-label"> Job's name <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<?php
                                        echo '<input type="text" id="job_name" class="form-control" name="job_name" required value="' . $job_name . '">';
                                    ?>
<!--                                    <input type="text" id="job_name" class="form-control" name="job_name" required>-->
								</div>
							</div>
						</div>                                                         
                        
                        <div class="form-group">
                            <label for="family_status">Job's type</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
</span>
                                    <?php
                                    echo '<select name="job_type" class="form-control"  id="job_type" value="' . $job_type . '" required selected><optgroup label="options">
                                        <option>Full time job</option>
                                        <option>Part time job</option>
                                    </optgroup>
                                    </select>';
                                    ?>
                                </div>            
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label for="department" class="cols-sm-2 control-label"> department <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
</span>
									<?php
                                        echo '<input type="text" id="job_department" class="form-control" name="job_department" required value="' . $department . '">';
                                    ?>
<!--                                    <input type="text" id="job_department" class="form-control" name="job_department" required>-->
								</div>
							</div>
						</div> 
                        
                        <br>
                        <div class="form-group">
							<label for="date" class="cols-sm-2 control-label">Job's open date <span id="req"></span></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									<?php
                                      echo '<input type="date" id="job_open_date" class="form-control" name="job_open_date" required value="' . $job_open_date .'">';
                                    ?>
<!--                                    <input type="date" id="job_open_date" class="form-control" name="job_open_date" required>-->
								</div>
							</div>
						</div>                               
                             
                        <div class="details">
                            <div><label for="Job's details">Job's details </label>
                                <br>
                                <?php
                                    echo '<textarea cols="96" name="job_details" id="job_details" rows="4">' . $description . "</textarea>";  
                                ?>                      
<!--                                <textarea cols="96" name="job_details" id="job_details" rows="4"></textarea>-->
                            </div>
                        
                            <div><label for="Job requirements">Job requirements</label>
                                <?php
                                    echo '<textarea cols="96" name="job_requirements" id="job_requirements" rows="4">' . $job_requires . "</textarea>";
                                ?>
<!--                                <textarea cols="96" name="job_requirements" id="job_requirements" rows="4"></textarea>-->
                            </div>
                        </div>
                                 
                        <div class="form-group">
                            <label for="family_status">Job Status</label>
                            <div class="inputs">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
</span>
<!--                                    <optgroup label="options">-->
                                      <?php
                                        echo '<select name="job_status" class="form-control"  id="job_status" required><optgroup label="options">
                                            <option>Approved</option>
                                            <option>Declined</option>
                                        </optgroup>
                                        </select>';
                                    ?>
<!--                                    </optgroup>-->
                                </div>            
                            </div>
                        </div>
                        
                        <?php
                            echo '<div class="save"><input type="submit" id="button" class="btn_save btn login-button" value=" ' . $submit_button . ' "  onClick="validate()"><input type="hidden" name="button_pressed" value="2"> </div>';
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
                                $job_status = $_POST["job_status"];
                                $job_requester = $_POST["job_requester"];
                                
                                $sql = '';
                                if ($is_update == "true"){
                                    $sql = "UPDATE job set job_name='" . $job_name . "' ,job_requires='" . $job_requires . "' ,job_creator='" . $job_creator . "' ,job_type='" . $job_type . "' ,department='" . $department . "' ,job_open_date='" . $job_open_date . "' ,description='" . $description . "' ,job_status='" . $job_status . "' ,job_requester='" . $job_requester . "' WHERE job_number=" . $job_num;
                                     if($conn->query($sql) === TRUE){                                     
                                         echo  "<script> alert('Job is successfully updated');
                                         window.location='../jobList/jobMenu.PHP';
                                         </script>";
                                    }
                                    else {
                                         echo  "<script> alert('There was a problen updating the job, please try again');
                                         window.location='../formNewJob/formNew.PHP';
                                         </script>"; 
                                    }
                                }
                                else{
                                    $sql="INSERT INTO job (job_name,job_requires,job_creator, job_type,department,job_open_date,description, job_status, job_requester ) values ('".$job_name."','".$job_requires."','".$job_creator."','".$job_type."','".$department."','".$job_open_date."','".$description."','". $job_status . "','" . $job_requester . "' );";
                                    if ($conn->query($sql) === TRUE) {
                                        echo  "<script> window.alert ('Your new job has been saved');
                                         window.location='../jobList/jobMenu.PHP';
                                         </script>";
                                    }
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

<!--
 <script>
    $("select[name='status']").val();
</script>
-->
