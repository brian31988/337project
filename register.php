<?php 
    require("databaseconnect.php");
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['CUS_USERNAME'])) 
        { die("Please enter a username."); } 
        if(empty($_POST['CUS_PASS'])) 
        { die("Please enter a password."); } 
        if(!filter_var($_POST['CUS_EMAIL'], FILTER_VALIDATE_EMAIL)) 
        { die("Invalid E-Mail Address"); } 
          
        // Check if the username is already taken
        $query = " 
            SELECT 
                1 
            FROM customer 
            WHERE 
                CUS_USERNAME = :CUS_USERNAME 
        "; 
        $query_params = array( ':CUS_USERNAME' => $_POST['CUS_USERNAME'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){ die("This username is already in use"); } 
        $query = " 
            SELECT 
                1 
            FROM customer 
            WHERE 
                CUS_EMAIL = :CUS_EMAIL 
        "; 
        $query_params = array( 
            ':CUS_EMAIL' => $_POST['CUS_EMAIL'] 
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
        $row = $stmt->fetch(); 
        if($row){ die("This email address is already registered"); } 
          
        // Add row to database 
        $query = " 
            INSERT INTO customer ( 
                CUS_USERNAME, 
                CUS_PASS, 
                CUS_SALT, 
                CUS_EMAIL,
                CUS_FNAME, 
                CUS_LNAME, 
                CUS_STREET, 
                CUS_CITY, 
                CUS_STATE, 
                CUS_ZIP, 
                CUS_PHONE
            ) VALUES ( 
                :CUS_USERNAME, 
                :CUS_PASS, 
                :CUS_SALT, 
                :CUS_EMAIL,
                :CUS_FNAME, 
                :CUS_LNAME, 
                :CUS_STREET, 
                :CUS_CITY, 
                :CUS_STATE, 
                :CUS_ZIP, 
                :CUS_PHONE
            ) 
        "; 
          
        // hash it
        $CUS_SALT = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $CUS_PASS = hash('sha256', $_POST['CUS_PASS'] . $CUS_SALT); 
        for($round = 0; $round < 65536; $round++){ $CUS_PASS = hash('sha256', $CUS_PASS . $CUS_SALT); } 
        $query_params = array( 
            ':CUS_USERNAME' => $_POST['CUS_USERNAME'], 
            ':CUS_PASS' => $CUS_PASS, 
            ':CUS_SALT' => $CUS_SALT, 
            ':CUS_EMAIL' => $_POST['CUS_EMAIL'],
            ':CUS_FNAME' => $_POST['CUS_FNAME'],
            ':CUS_LNAME' => $_POST['CUS_LNAME'],
            ':CUS_STREET' => $_POST['CUS_STREET'],
            ':CUS_CITY' => $_POST['CUS_CITY'],
            ':CUS_STATE' => $_POST['CUS_STATE'],
            ':CUS_ZIP' => $_POST['CUS_ZIP'],
            ':CUS_PHONE' => $_POST['CUS_PHONE']

        ); 
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        header("Location: registerconfirm.html"); 
        die("Redirecting to index.html"); 
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
  <li role="presentation"><a href="login.php">Login</a></li>
<li role="presentation" class="active"><a href="register.php">Register</a></li>

</ul>
<br>
        </div>
<div class="container">
    <div class="jumbotron">
  <div class="row">
    <div class="col-12 text-center">

            <h1>Marstons</h1>
           <h2>Register Page</h2>
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
    <form action="register.php" method="post"> 
    <label>Username:</label> 
    <input type="text" name="CUS_USERNAME" value="" /> </br>
    <label>Email:</label> 
    <input type="text" name="CUS_EMAIL" value="" /> </br>
    <label>Password:</label> 
    <input type="password" name="CUS_PASS" value="" /> </br>
    <label>First Name:</label> 
    <input type="text" name="CUS_FNAME" value="" /> </br>
    <label>Last Name:</label> 
    <input type="text" name="CUS_LNAME" value="" /> </br>
    <label>Street Address:</label> 
    <input type="text" name="CUS_STREET" value="" /> </br>
    <label>City:</label> 
    <input type="text" name="CUS_CITY" value="" /> </br>
    <label>State:</label> 
<select name="CUS_STATE" />
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>				</br>
				
    <label>Zip code:</label> 
    <input type="tel" name="CUS_ZIP" value="" maxlength="5" /> </br>
    <label>Phone number:</label> 
    <input type="tel" name="CUS_PHONE" value="" maxlength="10" /> </br>

    <input type="submit" class="btn btn-info" value="Register" /> 
</form></center></div><br>
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
