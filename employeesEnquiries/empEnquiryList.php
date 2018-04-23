<!DOCTYPE html>
<?php session_start();
 $email=$_SESSION["email"];
  $permission = $_SESSION["permission"];
 
 ?>
<html>
	<head>
	   <script> var permission = <?php echo $permission ; ?> ; </script>
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
            <a href = "../homePage/homePage.html"><img id ="logo" src = "../homePage/logo.png" ></a>
            <a href = "../homePage/homePage.html"><img id ="home" src = "../homePage/home.png" ></a>
            <a href = "../logInPage/logInPage.html"><img id ="logOut" src = "../homePage/logOut.png" ></a>
        </header>
        
        					<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modaltitle" class="modal-title">The Enquiry:</h4>
        </div>
        <div class="modal-body">
          <p id="modalbody">Some text in the modal. </p>
        </div>
        <div class="modal-footer">
        
        
        
          <button id="b_response" type="button" class="btn btn-primary" style="display: none;">Response</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <script>
              
                if (permission == 1){
                 $('#b_response').show(0);}    
          </script>
         
         <script>
            var id_row;
           
            $("#myModal").on('shown.bs.modal', function () {

                $('#b_response').focus();
                $('#b_response').click(function (event) {
                     window.location="response.php?id_row="+id_row;
                
                    });
                });
					
        </script>
         
         
        </div>
      </div>
      
    </div>
  </div>
      
<!-------------MAIN--------------->
        <main>
            <div class="container">
                <div class="row main">
				    <div class="main-login main-center">
                <!-------your main here-------->
						 <h3><b> Employees Enquiries</b></h3>
						
					   	<button  id="open" type="button" class="btn btn-primary" onClick="location.href = 'newEnquiry.php';" style="display: none;">Open New Enquiry</button>
					    <button id="report" type="button" class="btn btn-primary" style="display: none;">Create Enquiry Report</button>

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
                                   echo "<script> $('#report').show(0);</script>";
                                        
									$sql = "SELECT subject,name,date,hr_response,enquiry.id FROM employee,enquiry where sender=employee.email and hr_response='' ";
									$result = $conn->query($sql); 
									

									if ($result->num_rows > 0) { 
										 echo "
                                                    <table>
                                                      <tr>
                                                        <th>Subject </th>
                                                        <th>Name </th>
                                                        <th>Date </th>
                                                        <th>Id</th>
                                                        <th>Response</th>
                                                      </tr>
                                             ";
										 // output data of each row 
										 
										 while($row = $result->fetch_assoc()) {
											 
											 echo "<tr><td>" . $row["subject"]. "</td><td>" . $row["name"]. "</td><td>" . $row["date"]."</td><td>"."<p Id='xyz'>".$row["id"]."</p>"."</td><td>". "<input class='update-allocation' type='submit' name='update-allocation' value='Open'data-toggle='modal' data-target='#myModal' ></input>". "</td></tr>"; 
											 
											 
										 }
										 echo "</table>";
										 
										 
									} else{
                                        echo "<div class = 'empty'> ";
										  echo "<p id='emptyList'> Enquiry List Is Empty !</p>";
                                          echo " <img id='noEnq' src='emptymsg.png' alt='No Enquiry'>";
                                        echo "</div>";
                                        }
								}
								else // for employee
								{
                                    echo " <script> $('#open').show(0);</script>";
                                    
									$sql = "SELECT subject,name,date,hr_response,enquiry.id FROM employee,enquiry where sender=employee.email and sender=('$email')";
									$result = $conn->query($sql); 

									if ($result->num_rows > 0) { 
										 echo "
                                                        <table>
                                                          <tr>
                                                        <th>Subject </th>
                                                        <th>Name </th>
                                                        <th>Date </th>
                                                        <th>Id</th>
                                                        <th>Response</th> 
                                                        </tr>
                                                     ";
												  
										 while($row = $result->fetch_assoc()) {
                                             echo "<tr><td>" . $row["subject"]. "</td><td>" . $row["name"]. "</td><td>" . $row["date"]."</td><td>"."<p Id='xyz'>".$row["id"]."</p>"."</td><td>". "<input class='update-allocation' type='submit' name='update-allocation' value='Open'data-toggle='modal' data-target='#myModal' style='display: none;' ></input>". "</td></tr>";    										
    										 if (!empty($row["hr_response"])) {
    										 echo "<script>  $('.update-allocation').show(0); </script>";
    										 }
										     
										 }
										 
										 echo "</table>";
										 
									} 
									else
                                    {
                                        echo "<div class = 'empty'>";
										   echo "<p id='emptyList'> Enquiry List Is Empty !</p>";
                                        echo " <img id='noEnq' src='emptymsg.png' alt='No Enquiry'>";   
                                        echo "</div>";
                                    }
								}
									
								$conn->close();

							?>
							
							
						<script>
						$(document).ready(function () {
						$('.update-allocation').click(function (event) {
							var $row = $(this).parents('tr');
							 id_row = $row.find('p[Id="xyz"]').text();
							 
							 if (permission == 1){
    						    $.post('empDesc.php', { id_row: id_row}).done(function(data){ 
                                // alert(data);
                                     var empDesc= data;
                                     document.getElementById("modalbody").innerHTML = empDesc;
							 });}
    						 else{
    						    $.post('hrRes.php', { id_row: id_row}).done(function(data) {
                                 
                                     var hrRes= data;
                                  document.getElementById("modalbody").innerHTML = hrRes;    						    
    						      document.getElementById("modaltitle").innerHTML = "HR Response";
    						 });}
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