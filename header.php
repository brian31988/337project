<?php

require("databaseconnect.php");

if(!isset($_SESSION)){
session_start();
}
echo '

<!-- Latest compiled and minified CSS -->
<link rel="style" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

';

$is_logged_in = isset($_SESSION['CUS_USERNAME']);

echo '
<div class="container">
  <ul class="nav nav-tabs">
    <li role="presentation"' . ($page == "home" ? 'class="active"' : '') . '><a href="index.php">Home</a></li>
    <li role="presentation"' . ($page == "about" ? 'class="active"' : '') . '><a href="about.php">About Us</a></li>
    <li role="presentation"' . ($page == "contact" ? 'class="active"' : '') . '><a href="contact.php">Contact Us</a></li>';

  if ($is_logged_in) {
    echo '
    <li role="presentation"' . ($page == "search" ? 'class="active"' : '') . '><a href="search.php">Search</a></li>
    <li role="presentation"' . ($page == "cart" ? 'class="active"' : '') . '><a href="shopping-cart.php">View Cart</a></li>
    <li role="presentation"' . ($page == "profile" ? 'class="active"' : '') . '><a href="profile.php">Profile</a></li>
    <li role="presentation"><a href="logout.php">Log Out</a></li>';
  } else {
    echo '
    <li role="presentation"' . ($page == "login" ? 'class="active"' : '') . '><a href="login.php">Login</a></li>
    <li role="presentation"' . ($page == "register" ? 'class="active"' : '') . '><a href="register.php">Register</a></li>';
  }

echo '
  <br>
  </ul>
</div>
';

?>
