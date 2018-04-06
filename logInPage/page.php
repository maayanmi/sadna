
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php echo  $_SESSION["email"];
?>

<script>
//need to be in home page
//function that will be in every page in order to make sure that the person signed in and has the permission.    
    if (sessionStorage.permission == null){
         window.location="logInPage.php";
     }
    //if user dont have the right permission send him to unautorized page.
    // not in home page, only in specific pages
    if(sessionStorage.permission != 1){
        window.location="";
    }
    
    </script>
</body>
</html>