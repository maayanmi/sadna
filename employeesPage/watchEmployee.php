<!DOCTYPE html>
<html>
    <head>
        <title>Watch Employee</title>
        
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <a href = "../logInPage/logInPage.php"><img id ="logOut" src = "../homePage/logOut.png" ></a>
        </header>
      
<!-------------MAIN--------------->
        <main>
            <div class="container"  >
                <div class="row main" >
				    <div class="main-login main-center">
                <!-------your main here-------->
                        
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
                        
                        $id_emp = $_GET['id_emp'];
                        $sql = "SELECT * FROM employee WHERE id = '".$id_emp."'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo'<form class="" method="post" action="updateEmployee.php">
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
                                        <label for="adress" class="cols-sm-2 control-label">Adress <span id="req"></span></label>
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
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <select name="family_status" class="form-control"  id="family_status" value="'.$row["family_status"].'" required><optgroup label="options">
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
                                                <select name="gender" class="form-control"  id="gender" value="'.$row["gender"].'" required><optgroup label="options">
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
                                        <input type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button" value="Update" onClick="validate()">
                                    </div>
                                </form>';
                            }
                        }

                        $conn->close();
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
                <div class="footer-right">
                    <div class="footer-company-about">
                         <p><a herf = "#">Managing Job</a></p>
                         <p><a herf = "#">Employees</a></p>
                         <p><a herf = "#">Employees Enquiries</a></p>
                         <p><a herf = "#">Evaluations</a></p>
                    </div>
                </div>
             <span> <img id= "algoSec" src = "../homePage/AlgoSec.png"> </span>
            </div>
        </footer>
    </body>
</html>