<?php 
    require("databaseconnect.php"); 
    $submitted_username = ''; 
    if(!empty($_POST)){ 
        $query = " 
            SELECT 
                CUS_ID, 
                CUS_USERNAME, 
                CUS_PASS, 
                CUS_SALT, 
                CUS_EMAIL 
            FROM customer 
            WHERE 
                CUS_USERNAME = :CUS_USERNAME
        "; 
        $query_params = array( 
            ':CUS_USERNAME' => $_POST['CUS_USERNAME'] 
        ); 
          
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        $row = $stmt->fetch(); 
        if($row){ 
            $check_password = hash('sha256', $_POST['CUS_PASS'] . $row['CUS_SALT']); 
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['CUS_SALT']);
            } 
            if($check_password === $row['CUS_PASS']){
                $login_ok = true;
            } 
        } 
 
        if($login_ok){ 
            unset($row['CUS_SALT']); 
            unset($row['CUS_PASS']); 
            $_SESSION['CUS_USERNAME'] = $row;  
            header("Location: search.php"); 
            die("Redirecting to: login.php"); 
        } 
        else{ 
            print("Login Failed."); 
            $submitted_username = htmlentities($_POST['CUS_USERNAME'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?> 


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container">
<ul class="nav nav-tabs">
  <li role="presentation"><a href="index.html">Home</a></li>
  <li role="presentation"><a href="aboutus.html">About Us</a></li>
  <li role="presentation"><a href="contactus.html">Contact Us</a></li>
  <li role="presentation"><a href="search.php">Search</a></li>
  <li role="presentation" class="active"><a href="login.php">Login</a></li><li role="presentation"><a href="register.php">Register</a></li>

</ul>
<br>
        </div>
<div class="container">
    <div class="jumbotron">
  <div class="row">
    <div class="col-12 text-center">

            <h1>Marstons</h1>
           <h2>Login Page</h2>
           </div>
        </div>
        </div>
        </div>

<div class="container">
     <div class="row">
  <div class="col-xs-12">
    <div class="panel panel-primary">
  <div class="panel-heading">Enter your information:</div>

  <div class="panel-body"><center>
    <form action="login.php" method="post">
      <b>Username: </b><input type="text" name="CUS_USERNAME" value="<?php echo $submitted_username; ?>" />
      <br><b>Password: </b><input type="password" name="CUS_PASS" value="" /> 
    </br>
  <input type="submit" class="btn btn-info" value="Login" /> </form></center></div><br>
</div></div>

</div>
</div>
<style>p {
    padding: 25px 50px;
}

body {
    background-color: #b0c4de;
}
</style>
