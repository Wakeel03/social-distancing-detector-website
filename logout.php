<?php include 'config/init.php';?>
<?php

    session_start();

    unset($_SESSION['username']);
  
    header("Location: login.php");

    

?>