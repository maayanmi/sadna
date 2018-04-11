<!DOCTYPE html>
<html>
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
                
            }
        }//if there is only deprtment
        else if(empty($emp_name) && !empty($emp_department)){
        $sql = "SELECT * FROM employee WHERE department = '".$emp_department."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
            }
        }//if there is only name
        else if(empty($emp_department) && !empty($emp_nam){
            $sql = "SELECT * FROM employee WHERE name LIKE '%".$emp_name."%' OR name LIKE '".$emp_name."%' OR name LIKE '%".$emp_name."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
            }
        }//if both empty
        else{
            
        }
        $conn->close();
    ?>
</html>