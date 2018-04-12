<!DOCTYPE html>
<?php session_start();
 $email=$_SESSION["email"];
  $permission = $_SESSION["permission"];
  echo $permission ;
 ?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title></title>
        
        <link rel="stylesheet" href="../homePage/homePage.css">
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
		<link rel="stylesheet" href="empEnquiryList.css">
    </head>
    
    <body>
        <header>       
            <img id="logo" src="../homePage/logo.png">
            <img id="home" src="../homePage/home.png" href="#">
            <img id="logOut" src="../homePage/logOut.png" href="#">
        </header>
      
<!-------------MAIN--------------->
        <main>
            <div class="container">
                <div class="row main">
				    <div class="main-login main-center">
                <!-------your main here-------->
						 <h3><b> Employees Enquiries</b></h3>
						
                         <button  id="open" type="button" class="btn btn-primary">Open New Enquiry</button>
						
							<?php
								$servername = "localhost";
								$database = "maayanmi_hr4u";
								$username = "maayanmi_eyal";
								$password = "Aa123";
								$usertable="enquiry";
								// Create connection

								$conn = mysqli_connect($servername, $username, $password, $database);

								// Check connection

								if (!$conn) {

									die("Connection failed: " . mysqli_connect_error());
								}
								
								if ($permission == 1) //for hr manger
								{
									$sql = "SELECT subject,name,date,hr_response,enquiry.id FROM employee,enquiry where sender=employee.email and hr_response is NOT null";
									$result = $conn->query($sql); 

									if ($result->num_rows > 0) { 
										 echo "<div class='tableEnq'>
										        <table>
												  <tr>
													<th>Subject </th>
													<th>Name </th>
													<th>Date </th>
													<th>id</th>
													<th>Response</th>
												  </tr>";
										 // output data of each row 
										 
										 while($row = $result->fetch_assoc()) {
											 
											 echo "<tr><td>" . $row["subject"]. "</td><td>" . $row["name"]. "</td><td>" . $row["date"]."</td><td>"."<p id='xyz'>".$row["id"]."</p>"."</td><td>". "<input class='update-allocation' type='submit' name='update-allocation' value='Response'></input>". "</td></tr>"; 
											
											 
										 }
										 echo "</table>
										 </div>";
										 
									} else
										 echo "0 results";
								}
								else // for employee
								{
									$sql = "SELECT subject,name,date FROM employee,enquiry where sender=employee.email and sender=('$email')";
									$result = $conn->query($sql); 

									if ($result->num_rows > 0) { 
										 echo "<table>
												  <tr>
													<th>Subject </th>
													<th>Name </th>
													<th>Date </th>
												  </tr>";
												  
										 while($row = $result->fetch_assoc()) {
											 echo "<tr><td>" . $row["subject"]. "</td><td>" . $row["name"]. "</td><td>" . $row["date"]. "</td></tr>"; 
										 }
										 echo "</table>";
									} 
									else
										 echo "0 results";
								}
									
								$conn->close();
							?>
							
							<button id="newEnq" type="button" class="btn btn-primary">Create Enquiry Report</button>
							
						<script>
						$(document).ready(function () {
						$('.update-allocation').click(function (event) {
							var $row = $(this).parents('tr');
							var id_row = $row.find('p[id="xyz"]').text();
                            window.location="response.php?id_row="+id_row;
                       
                        })});
							
				
						</script>
					

                </div>
                </div>
            </div>
        </main>
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