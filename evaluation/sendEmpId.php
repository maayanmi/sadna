
<?php

session_start();

     if (isset($_POST['emp_id_fill'])){
         $emp=$_POST['emp_id_fill'];
            $_SESSION["emp_id_f"]=$emp;
            echo  $_SESSION["emp_id_f"] ;
             
    }
    
       if (isset($_POST['emp_id_watch'])){
         $emp=$_POST['emp_id_watch'];
            $_SESSION["emp_id_w"]=$emp;
             echo  $_SESSION["emp_id_w"] ;
    }
    
    
    
?>
