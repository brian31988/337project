<?php 
    require("databaseconnect.php");
	session_start();
    unset($_SESSION['CUS_USERNAME']);
    header("Location: index.php"); 
    die("Redirecting to: index.php");
?>