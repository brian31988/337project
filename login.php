<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
else if(isset($_POST['btn-login']))
{
 $username = mysql_real_escape_string($_POST['username']);
 $password = mysql_real_escape_string($_POST['password']);
 $res=mysql_query("SELECT * FROM users WHERE username='$username'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($password))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: home.php");
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }

}
?>
