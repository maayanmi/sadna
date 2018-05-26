<!DOCTYPE html>
<?php session_start();
 $email=$_SESSION["email"];
 $permission = $_SESSION["permission"];
 $pic=$_SESSION["picture"];
 ?>
<html>
    <head>
        <title>Employees Menu</title>
        <link rel="icon" href="../homePage/logo.png">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
       <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!-- Sidenav bootstrap css -->
      
            <!-- Bootstrap Footer Social icons -->
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://assets/css/Footer-with-social-icons.css">
      <!--/ Bootstrap Footer Social icons -->
        
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
       <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!-- Sidenav bootstrap css -->
      
            <!-- Bootstrap Footer Social icons -->
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://assets/css/Footer-with-social-icons.css">
      <!--/ Bootstrap Footer Social icons -->
        
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        
         <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="EmployeesMenuStyle.css">
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
        <script>
            function setID(id_emp) { 
                if (id_emp) {
                    window.location = 'watchEmployee.php?id_emp=' + id_emp;
                }
            };
        </script>
<!-------------MAIN--------------->
        <main>
             <div class="container"  >
			 <div class="row main" >
				<div class="main-login main-center">
                    <h3>Employees</h3>
                    <form class="" method="post" action="employeesMenu.php">
                    <fieldset>
                        <legend>Search:  </legend>
                        <div class="col-md-3 col-sm-3 col-xs-3 sec">
                            <label for="name" class="cols-sm-2 lables">Name:
                                  <span id="req"></span></label>
                             <input type="search" class="form-control" name="employees_name">
                        </div>
                        <br>
                        <div class="emp_depart col-md-3 col-sm-3 col-xs-3 sec">
                            <label for="name" class="cols-sm-2 lables" >Department:
                                <span id="req"></span></label>
                            <input type="search" class="form-control" name="employees_department">
                        </div>
                        <br>
                        <div class="search-part">
                                <div class="search col-md-2 col-sm-2 col-xs-3"><button type="submit" class="btn btn-primary">Search</button></div>
                                <div class="col-md-5 col-sm-5 col-xs-35"></div>
                        </div>
                    </fieldset>
                    
                    <br>
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

                            $emp_name = $_POST["employees_name"];
                            $emp_department = $_POST["employees_department"];

                            if(!empty($emp_name) && !empty($emp_department)){
                                $sql = "SELECT * FROM employee WHERE department = '".$emp_department."' 
                                AND name LIKE '%".$emp_name."%' OR name LIKE '".$emp_name."%' OR name LIKE '%".$emp_name."'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo '<table>
                                            <tr>
                                             <th>Name </th>
                                             <th>Department </th>
                                             <th> </th>
                                            </tr>';
                                             // output data of each row 

                                    while($row = $result->fetch_assoc()) {
                                        $emp_id = $row["id"];
                                        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td><td> 
                                        <button type='button' style='color:black;background-color: #a8a8ad;border-bottom-color: grey;font-family: arial, sans-serif;' class='btn' onclick = 'setID($emp_id)'>Watch</button></div>
                                    </td></tr>"; 
                                    }
                                    echo "</table>";

                                }
                                else{
                                echo 
                                    '<div class="alert alert-info">
                                    <a href="employeesMenu.php" class="btn btn-xs btn-primary pull-right" onclick="javascript:window.close()">close</a>
                                    <strong>Info:</strong>No Result Found</div>';
                                }
                            }
                            //if there is only deprtment
                            else if(empty($emp_name) && !empty($emp_department)){
                            $sql = "SELECT * FROM employee WHERE department = '".$emp_department."'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table>
                                            <tr>
                                             <th>Name </th>
                                             <th>Department </th>
                                             <th> </th>
                                            </tr>";
                                             // output data of each row 

                                    while($row = $result->fetch_assoc()) {
                                        $emp_id = $row["id"];
                                        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td><td> 
                                        <button type='button' style='color:black;background-color: #a8a8ad;border-bottom-color: grey;font-family: arial, sans-serif;' class='btn' onclick = 'setID($emp_id)'>Watch</button></div>
                                     </td></tr>";
                                    }
                                    echo "</table>";

                                }
                                else{
                                echo 
                                    '<div class="alert alert-info">
                                    <a href="employeesMenu.php" class="btn btn-xs btn-primary pull-right"  onclick="javascript:window.close()">close</a>
                                    <strong>Info:</strong>No Result Found</div>';
                                }
                            }
                            //if there is only name
                            else if(empty($emp_department) && !empty($emp_name)){
                                $sql = "SELECT * FROM employee WHERE name LIKE '%".$emp_name."%' OR name LIKE '".$emp_name."%' OR name LIKE '%".$emp_name."'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table>
                                            <tr>
                                             <th>Name </th>
                                             <th>Department </th>
                                             <th> </th>
                                            </tr>";
                                             // output data of each row 

                                    while($row = $result->fetch_assoc()) {
                                        $emp_id = $row["id"];
                                        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td><td> 
                                        <button type='button' class='btn' style='color:black;background-color: #a8a8ad;border-bottom-color: grey;font-family: arial, sans-serif;' onclick = 'setID($emp_id)'>Watch</button></div>
                                     </td></tr>"; 
                                    }

                                    echo "</table>";
                                }
                                else{
                                echo 
                                    '<div class="alert alert-info">
                                    <a href="employeesMenu.php" class="btn btn-xs btn-primary pull-right" onclick="javascript:window.close()">close</a>
                                    <strong>Info:</strong>No Result Found</div>';
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
       
                     <div class="row" style="margin-top:  0;">
                        <div class="col-md-2 col-sm-2 col-xs-3"><button type="button" class="btn btn-primary" onclick='window.location.href="newEmployee.php"'>Add New Employee</button></div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <button type="button" class="btn btn-primary" onclick="window.location='mbo.php'">Create MBO Report</button></div>
                        <div class="col-md-5 col-sm-5 col-xs-35"></div>
                    </div>
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
