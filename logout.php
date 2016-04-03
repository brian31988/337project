<?php 
    require("databaseconnect.php"); 
    unset($_SESSION['CUS_USERNAME']);
    header("Location: index.php"); 
    die("Redirecting to: index.php");
?>