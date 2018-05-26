<!DOCTYPE html>

<?php

     session_start();
     $email=$_SESSION["email"];
     $permission = $_SESSION["permission"];
      $pic=$_SESSION["picture"];
     
      if ($permission == 1) //for hr manger
    {
 
    $servername = "localhost";
    $database = "maayanmi_hr4u";
    $username = "maayanmi_eyal";
    $password = "Aa123";
    $usertable="permissions";

    // Create connection

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection

    if (!$conn) {

        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "SELECT COUNT(id) as id, subject FROM `enquiry` where year(close_date)='2018' GROUP BY subject";
   if( $result = $conn->query($sql)){


        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ( $row["subject"] =="Labor Laws"){
                $Laws = $row["id"];
            }
            else {
            ${$row["subject"]} = $row["id"]; 
        }

        }

   }
   
   $sql1="SELECT MONTHNAME (close_date) as month,COUNT(*) as amount FROM `enquiry` WHERE hr_response <> '' and year(close_date)='2018' group by MONTH (close_date)";
   
    if( $result = $conn->query($sql1)){


        // output data of each row
        while($row = $result->fetch_assoc()) {
            ${$row["month"]} = $row["amount"];

        }
        
   }

}

else // for employee
{
     echo "<script> window.alert ('You have no authorization');
                            window.location='../logInPage/unauthorized.html';
           </script>";
}
?>



<html>
    <head>
          <title>Enquiry Report</title>
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
        
        <link rel="stylesheet" href="../homePage/homePage.css" >
        <link rel="stylesheet" href="../formNewJob/formStyle.CSS">
        <link rel="stylesheet" href="enqReport.css">
        
        <script>
             var Laws= <?php echo $Laws; ?>;
             var General =<?php echo $General; ?>;
             var Paycheck= <?php echo $Paycheck; ?>;
             var Welfare= <?php echo $Welfare; ?>;
             var Personal =<?php echo $Personal; ?>;
             
             </script>
             
              <script>
            var January= <?php if(isset($January)){ 
                                echo $January;}
                            else{$January= 0;
                                echo $January;
                            };
                            ?>;
            var February= <?php if(isset($February)){ 
                                echo $February;}
                            else{$February= 0;
                                echo $February;
                            }; 
                            ?>;
            var March= <?php if(isset($March)){ 
                                echo $March;}
                            else{$March= 0;
                                echo $March;
                            };
                            ?>;
            var April= <?php if(isset($April)){ 
                                echo $April;}
                            else{$April= 0;
                                echo $April;
                            }; 
                            ?>;
            var May= <?php if(isset($May)){ 
                                echo $May;}
                            else{$May= 0;
                                echo $May;
                            };
            ?>;
            
            var June= <?php if(isset($June)){ 
                                echo $June;}
                            else{$June= 0;
                                echo $June;
                            };
            ?>;
            
             var July= <?php if(isset($July)){ 
                                echo $July;}
                            else{$July= 0;
                                echo $July;
                            };
            ?>;
           
           var August=<?php if(isset($August)){ 
                                echo $August;}
                            else{$August= 0;
                                echo $August;
                            };
            ?>;
            
             var September =<?php if(isset($September)){ 
                                echo $September;}
                            else{$September= 0;
                                echo $September;
                            };
            ?>;
             var October =<?php if(isset($October)){ 
                                echo $October;}
                            else{$October= 0;
                                echo $October;
                            };
            ?>;
            var November =<?php if(isset($November)){ 
                                echo $November;}
                            else{$November= 0;
                                echo $November;
                            };
            ?>;
            var December =<?php if(isset($December)){ 
                                echo $December;}
                            else{$December= 0;
                                echo $December;
                            };
            ?>;
        
             
             </script>
        
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

          // Load the Visualization API and the corechart package.
          google.charts.load('current', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.charts.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Subject');
            data.addColumn('number', 'Enquiries');
            data.addRows([
              ['General', General],
              ['Labor Laws', Laws],
              ['Paycheck', Paycheck],
              ['Welfare', Welfare],
              ['Personal', Personal]
            ]);
            
            // Create the data table.
            var data1 = new google.visualization.DataTable();
                        
            data1.addColumn('string', 'Month');
            data1.addColumn('number', 'Enquiries');
            data1.addColumn({type: 'string', role: 'style'});
             <?php if($January!=0)
            {
                echo "data1.addRow(['January', January, 'color: yellow']);" ; 
            }
            ?>
             <?php if($February!=0)
            {
                echo "data1.addRow(['February', February, 'color: orange']);"; 
            }
            ?>
             <?php if($Marc!=0)
            {
                echo" data1.addRow(['March', March, 'color: purple']);"; 
            }
            ?>
           
             <?php if($April!=0)
            {
                echo "data1.addRow(['April', April, 'color: red']);";
            }
             ?>
            <?php if($May!=0)
            {
                echo "data1.addRow(['May', May, 'color: green']);";
                
            }
            ?>
         
            <?php if($June!=0)
            {
                echo "data1.addRow(['June', June, 'color: red']);";
                
            }
            ?>
            <?php if($July!=0)
            {
                echo "data1.addRow(['July', July, 'color: red']);";
                
            }
            ?>
            <?php if($August!=0)
            {
                echo "data1.addRow(['August', August, 'color: red']);";
                
            }
            ?>
            <?php if($September!=0)
            {
                echo "data1.addRow(['September', September, 'color: red']);";
                
            }
            ?>
            <?php if($October!=0)
            {
                echo "data1.addRow(['October', October, 'color: red']);";
                
            }
            ?>
            <?php if($November!=0)
            {
                echo "data1.addRow(['November', November , 'color: red']);";
                
            }
            ?>
            <?php if($December!=0)
            {
                echo "data1.addRow(['December', December , 'color: red']);";
                
            }
            ?>
          
      
          
        // Set chart options
        //pie
        var options = {
                       'width':750,
                       'height':300,
                       backgroundColor: { fill:'transparent' },
                       titleTextStyle:{color:'white'},
                       legend:{textStyle: {color:'white'}},
                       //chartArea:{right:0,top:40,width:'90%',height:'75%'},

                        is3D: false,
        };
        
        //barchart
        var options1 = {
                       'width':750,
                       'height':400,
                       backgroundColor: { fill:'transparent' },
                       titleTextStyle:{color:'white'},
                       legend: { position: 'none' },
                        textStyle: {color: 'white'},
                        vAxis: {baselineColor: 'white' },
                        vAxes: {0: {textStyle: {color: 'white'}}},
                        hAxes: {0: {textStyle: {color: 'white'}}}
 
  };
   
        
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        
        
        
         var chart = new google.visualization.ColumnChart(document.getElementById('chart1_div'));
        chart.draw(data1, options1);
      }
    </script>
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
<!-------------MAIN--------------->
        <main>
            <div class="container"  >
                <div class="row main" >
				    <div class="main-login main-center">
                <!-------your main here-------->
                        <h3 id="report"><b>Enquiries Report</b></h3>    
                         <div class="pie">
                              <h4 id="pie"><b><u>Enquiries Opened By Subject In 2018</u></b></h4>
                             <div id="chart_div"></div> <!--pie chart -->
                         </div>
                         <div class="barchart">
                             <h4 id="barchart"><b> <u>Resolved Enquiries In 2018</u></b></h4>
                             <div id ="chart1_div"></div> <!--bar chart -->
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