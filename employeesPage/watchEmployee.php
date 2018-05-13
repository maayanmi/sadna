<!DOCTYPE html>

<?php session_start();
 $email=$_SESSION["email"];
 $permission = $_SESSION["permission"];
 $id_emp = $_GET["id_emp"] ;
 ?>
<html>
    <head>
        <title>HR4U</title>
        <link rel="icon" href="../homePage/logo.png">
        
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
       <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!-- Sidenav bootstrap css -->
      
            <!-- Bootstrap Footer Social icons -->
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://assets/css/Footer-with-social-icons.css">
      <!--/ Bootstrap Footer Social icons -->
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="../employeesPage/newEmployeeStyle.css">
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
                <!-------your main here-------->
                        
                    <?php
                        if ($permission == 1) //for hr manger 
                       {
                            $servername = "localhost";
                            $database = "maayanmi_hr4u";
                            $username = "maayanmi_eyal";
                            $password = "Aa123";
                            // Create connection

                            $conn = mysqli_connect($servername, $username, $password, $database);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 


                                $sql = "SELECT * FROM employee WHERE id = '".$id_emp."'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo'<form class="" method="post" action="watchEmployee.php">
                                            <h3>Create New Employee</h3>
                                            <div class="form-group">
                                                <label for="name" class="cols-sm-2 lables" >Name
                                                    <span id="req"></span></label>
                                                <div class="inputs">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="name" id="name" value="'.$row["name"].'" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="adress" class="cols-sm-2 control-label">Address <span id="req"></span></label>
                                                <div class="inputs">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                        <input   type="text" class="form-control" name="adress" id="adress" value="'.$row["adress"].'" required >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone_number" class="cols-sm-2 control-label"> Phone Number <span id="req"></span></label>
                                                <div class="cols-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                        <input type="job name" class="form-control" name="phone_number" id="phone_number" value="'.$row["phone"].'" required>
                                                    </div>
                                                </div>
                                            </div>                                 

                                            <div class="form-group">
                                                <label for="family_status">Family Status</label>
                                                <div class="inputs">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>';
                                                        $sql_2="SELECT family_status
                                                                    FROM employee
                                                                    GROUP BY family_status";
                                                        $result_2 = mysqli_query($conn, $sql_2);
                                                        echo '<select name="family_status" class="form-control" id="family_status" required>';
                                                        
                                                        while($row_2 = mysqli_fetch_assoc($result_2)) {
                                                            if($row_2['family_status'] == $row['family_status']){
                                                                echo "<option value='".$row['family_status']."' selected>".$row['family_status']."</option>";
                                                            }
                                                            else{
                                                                echo "<option value='".$row_2['family_status']."'>".$row_2['family_status']."</option>";
                                                            }
                                                        }
                                                        echo '</select>
                                                    </div>            
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <div class="inputs">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>';
                                                        $sql_1="SELECT gender
                                                                    FROM employee
                                                                    GROUP BY gender";
                                                        $result_1 = mysqli_query($conn, $sql_1);
                                                        echo '<select name="gender" class="form-control"  id="gender" required>';
                                                        
                                                        while($row_1 = mysqli_fetch_assoc($result_1)) {
                                                            if($row_1['gender'] == $row['gender']){
                                                                 echo "<option value='".$row['gender']."' selected>".$row['gender']."</option>";
                                                            }
                                                            else{
                                                                echo "<option value='".$row_1['gender']."'>".$row_1['gender']."</option>";
                                                            }
                                                        }
                                                        echo '</select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="job" class="cols-sm-2 control-label"> Job <span id="req"></span></label>
                                                <div class="cols-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                        <input type="job name" class="form-control" name="job" id="job" value="'.$row["job"].'" required>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <label for="department" class="cols-sm-2 control-label"> Department <span id="req"></span></label>
                                                <div class="cols-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                        <input type="job name" class="form-control" name="department" id="department" value="'.$row["department"].'" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="manager" class="cols-sm-2 control-label"> Manager <span id="req"></span></label>
                                                <div class="cols-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                        <input type="job name" class="form-control" name="manager" id="manager"  value="'.$row["manager"].'" required>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <label for="salary" class="cols-sm-2 control-label"> Salary <span id="req"></span></label>
                                                <div class="cols-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                        <input type="number" class="form-control" name="salary" id="salary" value="'.$row["salary"].'" required>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="form-group">
                                                <label for="date" class="cols-sm-2 control-label">Start Date <span id="req"></span></label>
                                                <div class="cols-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                        <input type="start_date" class="form-control" name="start_date" id="start_date" value="'.$row["start_date"].'" required>
                                                    </div>
                                                </div>
                                            </div>                       

                                            <div class="form-group">
                                                <label for="email" class="cols-sm-2 control-label"> Email <span id="req"></span></label>
                                                <div class="cols-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                        <input type="email" class="form-control" name="email" id="email" value="'.$row["email"].'" required>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="save">
                                                <input type="submit" id="button" class="btn_save btn btn-primary btn-lg btn-block login-button" value="Update" name="update" onClick="validate()">
                                            </div>
                                            <input type="hidden" name="id_emp" value="'.$id_emp.'"> 
                                        </form>';

                                    }
                                }

                                if(isset($_POST['update'])){
                                    $id_emp = $_POST['id_emp'];
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

                                    $sql ="UPDATE employee SET name='".$name."' ,adress='".$adress."',phone='".$phone_number."',family_status='".$family_status."', gender='".$gender."',job='".$job."',department='".$department."',manager='".$manager."',salary='".$salary."', start_date='".$start_date."',email='".$email."' WHERE id='".$id_emp."'";

                                    $result = $conn->query($sql);

                                    if(mysqli_affected_rows($conn)){                                     
                                         echo  "<script> window.alert ('Update Employee Complete!');
                                         window.location='employeesMenu.php';
                                         </script>";
                                    } 
                                    else {
                                          echo "<script> window.alert ('There was a problem updating, Try again later');
                                         window.location='employeesMenu.php';
                                         </script>";
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