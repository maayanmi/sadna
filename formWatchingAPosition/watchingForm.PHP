
<!DOCTYPE html>

<html>
    <?php 
     session_start();
                
     $id_row = $_GET["job_num"] ;
    
    ?>
        

<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
         
        
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
                        <form action="" method="post">
                        
                    
                        
                    <?php
                    
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
                            
                        $sql="SELECT job_name, job_type, description, job_requires FROM job WHERE job_number=" . $id_row;
                        $result= $conn->query($sql); 
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<h1>".$row["job_name"]." (".$row["job_type"].")</h1><br>";
                                echo "<h2>Description</h2><br><p>".$row['description']."</p><br>";
                                echo "<h2>Requirements</h2><br><p>".$row['job_requires']."</p>";
                            }
                        }
                        
                         $conn->close();
                    ?>
                            
                            
                    <?php
                         echo '<div class="update">
                           <div class="col-md-2 col-sm-2 col-xs-3"><button type="button" class="btn btn-primary" onclick="window.location.href=\'../formNewJob/formNew.PHP?is_update=true&job_num=' . $id_row . "'\">Update</button></div>";
                    ?>
                               
                             
                        </form>
                        
                        <!---form of uploading cv -->
                        <form id ="myForm" action="bla" method="post" enctype="multipart/form-data">
                            Select CV upload (PDF only):
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload" name="submit">
                        </form>


                        <script>
                        var job_num = <?php echo $_GET["job_num"] ; ?> ;
                        var path = "upload.php?job_id=" ;
                        document.getElementById("myForm").action = path + job_num;
                        </script>
                        
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

