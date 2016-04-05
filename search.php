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
  <li role="presentation"class="active"><a href="search.php">Search</a></li>
  <li role="presentation"><a href="login.php">Login</a></li>
<li role="presentation"><a href="register.php">Register</a></li></ul>
<br>
        </div>

<div class="container">
    <div class="jumbotron">
  <div class="row">
    <div class="col-12 text-center">
            <h1>Marstons</h1>
           <h2>Search</h2>
           </div>
        </div>
        </div>
        </div>



<div class="container">
     <div class="row">
  <div class="col-xs-12">
  <table class="table table-striped">
<thead>
      <tr>
        <th>Search Inventory</th>
      </tr>
    </thead>
    <tbody>
      <div class="search">

		<form action="search.php?searching=true" method="POST">
		<input type="text" name="searchcategory" value=""/>
		<input type="submit" value="Search"/>
		</form>
	</div>
<table border="3" width="450" height ="200" cellpadding="10" cellspacing="10">
	<?php
	if('searching'==true && isset($_REQUEST['searchcategory'])){
		
	require("databaseconnect.php");
	$sql=$db->prepare('SELECT * FROM item WHERE ITEM_DEPARTMENT=:category');
    
		$sql->execute(array(':category'=> $_REQUEST['searchcategory']));
		echo "<th><font size='4'><em>Name</em></font></th>
			<th><em><font size='4'>Brand</em></font></th>
			<th><em><font size='4'>Color</em></font></th>
			<th><em><font size='4'>Department</em></font></th>
			<th><em><font size='4'>Price</em></font></th>
			<th><em><font size='4'>Action</em></font></th>";
		
	
	?>
	<?php
    while ($row=$sql->fetch())
    {
		?>
       
       <tr>
				<td><font size='4'><?php echo $row['ITEM_NAME']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_BRAND']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_COLOR']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_DEPARTMENT']?></font></td>
				<td><font size='4'><?php echo $row['ITEM_PRICE']?></font></td></td>
				<td><a href="search.php?page=search&action=add&id=<?php echo $row['ITEM_NUMBER'] ?>"><font size='4'>Add to cart</font></a></td>
			</tr>
    <?php
	}
	}
	?>
	
</table>

</div></div>
</div>
</div>
</div>
</div>

</div>
</div>

<style>p {
    padding: 25px 50px;
}
body {
    background-color: #b0c4de;
}

</style>
