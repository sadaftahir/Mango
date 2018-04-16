<?php
   //Start session
   session_start();
   
   //Remove all session variables
   session_unset(); 
   
   //Destroy the session 
   session_destroy(); 
   
   //Redirect to home page when logged out successfully
   echo "<script>window.open('index.php','_self')</script>";
   
  ?>