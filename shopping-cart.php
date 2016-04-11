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
  <li role="presentation" class="active"><a href="shopping-cart.php">View Cart</a></li>
  <li role="presentation"><a href="profile.php">Profile</a></li>
  <li role="presentation"><a href="login.php">Login</a></li>
<li role="presentation"><a href="register.php">Register</a></li></ul>
<br>
        </div>

<div class="container">
    <div class="jumbotron">
  <div class="row">
    <div class="col-12 text-center">
        <img src="marstons.png" height="250" width="250" style="float:left">
		<img src="marstons.png" height="250" width="250" style="float:right">
            <h1>Marstons</h1>
           <h2>cart</h2>
           </div>
        </div>
        </div>
        </div>

<div class="coupon">
<div class="photo">
    <p> Something just for you</p>
    </div>
</div>

<div class="container">
     <div class="row">
  <div class="col-xs-12">
  <table class="table table-striped">
<thead>
      <tr>
        <th>Cart Items</th>
      </tr>
    </thead>
    <tbody>
<?php 
if(isset($_SESSION['cart']))
{
	
?>   
<table border="3" width="450" height ="200" cellpadding="10" cellspacing="10">
	<?php
	
		echo "<th><font size='4'><em>Name</em></font></th>
			<th><em><font size='4'>Brand</em></font></th>
			<th><em><font size='4'>Color</em></font></th>
			<th><em><font size='4'>Department</em></font></th>
			<th><em><font size='4'>Price</em></font></th>";
		
	
	?>
	<?php
	$total = 0;
    foreach ($_SESSION['cart'] as $value)
    {
		$sql=$db->prepare('SELECT * FROM item WHERE ITEM_NUMBER = :item');
    
		$sql->execute(array(':item'=> $value));
		
       while ($row=$sql->fetch())
    {
		$total += $row['ITEM_PRICE'];
		?>
       <tr>
				<td><font size='4'><?php echo $row['ITEM_NAME']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_BRAND']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_COLOR']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_DEPARTMENT']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_PRICE']?></font></td></td>
			</tr>
    <?php
	}
	}
	}
	?>
	
</table>

</div></div>
</div>
</div>
<div align = "center">
<?php
if(isset($_SESSION['cart'])){
echo "<p><font size ='5'>Total Price = " . $total . "</font></p>";
}
?>
</div>
<footer> Mastons Depratment Store 2015</footer>

<style>p {
    padding: 25px 50px;
}
body {
   background-image: url(shopping.jpeg);
    background-color:lightgray;
   
}
div.coupon{
 background-image:url(coupons.png);   
}
    .photo{
        background-color:#ffffff;
        border:1px solid black;
        opacity: 0.6;
        filter:alpha(opacity=50);
        margin:300px;
        
    }
    .photo p {
        margin:15%;
        font-weight:bold;
        color:#000000;
        font-size: 50px;
    }
footer{
        font-weight:bold;
        color:black;
        text-align:center;
    }
</style>
