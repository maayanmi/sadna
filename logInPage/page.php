
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php 
    $email=$_SESSION["email"];
?>

<script>
permission = <?php echo $_SESSION["permission"] ?>;
email = <? php echo $_SESSION["email"] ?>

//function that will be in every page in order to make sure that the person signed in and has the permission.    
    if (permission == null){
         window.location="logInPage.php";
     }
    //if user dont have the right permission send him to unautorized page.
    
    if(permission != 1){
        window.location="unauthorized.html";
    }
    
    </script>
</body>
</html>



         