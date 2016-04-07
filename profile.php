<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php require("databaseconnect.php");
session_start();
?>

<div class="container">
<ul class="nav nav-tabs">
  <li role="presentation"><a href="index.html">Home</a></li>
  <li role="presentation"><a href="aboutus.html">About Us</a></li>
  <li role="presentation"><a href="contactus.html">Contact Us</a></li>
  <li role="presentation"><a href="search.php">Search</a></li>
  <li role="presentation"><a href="shopping-cart.php">View Cart</a></li>
  <li role="presentation"class="active"><a href="profile.php">Profile</a></li>
  <li role="presentation"><a href="login.php">Login</a></li>
<li role="presentation"><a href="register.php">Register</a></li></ul>
<br>
</div>

<div class="container">
  <div class="jumbotron">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Marstons</h1>
        <h2>Profile</h2>
      </div>
    </div>
  </div>
</div>

<?php

if (is_null($_SESSION['CUS_USERNAME'])) {
  header("Location: login.php");
  return;
}

$user = $_SESSION['CUS_USERNAME'];


echo "
  <table height ='200' width = '475'>
    <tbody>
      <tr>
        <td><b>Name:</b></td>
        <td>" . $user['CUS_FNAME'] . " " . $user['CUS_LNAME'] . "</td>
      </tr>
      <tr>
        <td><b>Username:</b></td>
        <td>" . $user['CUS_USERNAME'] . "</td>
      </tr>
      <tr>
        <td><b>Phone Number:</b></td>
        <td>" . $user['CUS_PHONE'] . "</td>
      </tr>
      <tr>
        <td><b>Email:</b></td>
        <td>" . $user['CUS_EMAIL'] . "</td>
      </tr>
      <tr>
        <td><b>Address:</b></td>
        <td>" . $user['CUS_STREET'] . " " . $user['CUS_CITY'] . ", " . $user['CUS_STATE'] . " " . $user['CUS_ZIP'] . "</td>
      </tr>
    </tbody>
  </table>
";
?>

<style>p {
    padding: 25px 50px;
}
body {
    background-color: #b0c4de;
}

</style>
