 <?php session_start();?>
 

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="logInPage.css">
       <link href="https://fonts.googleapis.com/css?family=Days+One" rel="stylesheet">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
       <meta name="google-signin-client_id" content="372565179564-34pshgjaql7ieu82ir1ctsvh76m7hals.apps.googleusercontent.com">
 
        <script>
        var permission =null;
        </script>
        
    </head>
    
    <body>


        <div class="container">
            <h1 id="welcome"><i>Welcome To HR4U</i> </h1>
        </div>
        <div class="bg"> 
            <div class="gcontainer">
                           
<script>
    function onSuccess(googleUser) {
        console.log('Signed in as: ' + googleUser.getBasicProfile().getName()); 
        $('#proceed').show(0); // button will appear after sign in
        
        // send user details to process.php
        var id_token = googleUser.getAuthResponse().id_token;
        var theUrl = "https://www.googleapis.com/oauth2/v3/tokeninfo?id_token="+id_token;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'process.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        //after sending it gets permission number from process.php
        xhr.onload = function() {
          console.log('Signed in as: ' + xhr.responseText);
          permission = xhr.responseText;
        };

    xhr.send('theurl=' + theUrl);

    }
                
</script>

                      
            <div  class="g-signin2" data-onsuccess="onSuccess"></div>
            <button type="button" id="proceed" onclick="per()" style="display: none;">Proceed</button>
                
                  
        </div>
    </div>
            
            
<script>
           function per(){
            sessionStorage.permission=permission ;
            if (permission!=0){
                window.location="../home%20page/homePage.html";
                }
            else
                window.location="unauthorized.html"
                      
            }
</script>
     
    </body>
</html>
        