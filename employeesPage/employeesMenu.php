<!DOCTYPE html>
<html>
    <head>
        <title>Employees Menu</title>
        
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
            <a href = "../homePage/homePage.html"><img id ="logo" src = "../homePage/logo.png" ></a>
            <a href = "../homePage/homePage.html"><img id ="home" src = "../homePage/home.png" ></a>
            <a href = "../logInPage/logInPage.php"><img id ="logOut" src = "../homePage/logOut.png" ></a>
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
                        <legend>Search Employee:</legend>
                        <div class="col-md-3 col-sm-3 col-xs-3 sec">
                            <label for="name" class="cols-sm-2 lables">Employee's Name:
                                  <span id="req"></span></label>
                             <input type="search" class="form-control" name="employees_name">
                        </div>
                        <br>
                        <div class="emp_depart col-md-3 col-sm-3 col-xs-3 sec">
                            <label for="name" class="cols-sm-2 lables" >Employee's Department:
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
                  <div class="col-md-2 col-sm-2 col-xs-3"></div>
                    <?php
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
                                    <button type='button' class='watch btn btn-primary' onclick = 'setID($emp_id)'>Watch</button></div>
                                <div class='col-md-5 col-sm-5 col-xs-35'> </td></tr>"; 
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
                                        </tr>";
										 // output data of each row 
										 
								while($row = $result->fetch_assoc()) {
									echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td></tr>"; 
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
                                        </tr>";
										 // output data of each row 
										 
    							while($row = $result->fetch_assoc()) {
    								echo "<tr><td>" . $row["name"]. "</td><td>" . $row["department"]. "</td></tr>"; 
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
                    ?>
                        <div class="col-md-2 col-sm-2 col-xs-3"><button type="button" class="btn btn-primary" onclick='window.location.href="newEmployee.html"'>Add New Employee</button></div>
                </div>
                    
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <button type="button" class="btn btn-primary" onclick="window.location='mbo.php'">Create MBO Report</button></div>
                        <div class="col-md-5 col-sm-5 col-xs-35"></div>
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
                <div class="footer-right">
                    <div class="footer-company-about">
                         <p><a herf = "#">Managing Job</a></p>
                         <p><a herf = "employeesMenu.html">Employees</a></p>
                         <p><a herf = "#">Employees Enquiries</a></p>
                         <p><a herf = "#">Evaluations</a></p>
                    </div>
                </div>
             <span> <img id= "algoSec" src = "../homePage/AlgoSec.png"> </span>
            </div>
        </footer>
    </body>
</html>
