<?php
$page = "search";
include 'header.php';
?>

<div class="container">
    <div class="jumbotron">
  <div class="row">
    <div class="col-12 text-center">
        <img src="marstons.png" height="250" width="250" style="float:left">
		<img src="marstons.png" height="250" width="250" style="float:right">
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
        <th>Search Inventory by Department, Brand, Name, Color, or Price</th>
      </tr>
	  <tr>
	  <div align= "center">
		<em><strong>Department List:</strong></em><br>Mens Shoes<br>Womens Shoes<br>Mens Clothing<br>Womens Clothing<br>
		Accessories<br>Mens Cologne<br>Womens Fragrance
		</div>
		</tr>
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


	$sql=$db->prepare("SELECT * FROM item WHERE
	ITEM_DEPARTMENT LIKE :category
	OR ITEM_NAME LIKE :category
	OR ITEM_BRAND LIKE :category
	OR ITEM_PRICE LIKE :category
	OR ITEM_COLOR LIKE :category");

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
				<td><a href="add-to-cart.php?id=<?php echo $row['ITEM_NUMBER'] ?>"><font size='4'>Add to cart</font></a></td>
			</tr>
    <?php
	}
	}
	?>

</table>

</div></div>
</div>
</div>
<footer> Mastons Depratment Store 2015</footer>
<style>
    p {
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
