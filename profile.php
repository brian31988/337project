<?php
$page = "profile";
include 'header.php';
?>

<div class="container">
  <div class="jumbotron">
    <div class="row">
      <div class="col-12 text-center">
          <img src="marstons.png" height="250" width="250" style="float:left">
		  <img src="marstons.png" height="250" width="250" style="float:right">
        <h1>Marstons</h1>
        <h2>Profile</h2>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Profile</div>
          <div class="panel-body">

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
        </div>
      </div>
    </div>
  </div>
</div>

<footer> Mastons Depratment Store 2015</footer>
<style>p {
    padding: 25px 50px;
}
body {
     background-image: url(shopping.jpeg);
          background-color:lightgray;

}
footer{
        font-weight:bold;
        color:black;
        text-align:center;
    }
    .nav-tabs{
      background-color:#f0f0f0;
    }

</style>
