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
        <th bgcolor="white" style="border-color: black"><center>Search by Department, Brand, Name, Color, or Price</center></th>
      </tr>
	  <tr>
	  <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><font size=4>Search Categories</font></center></div>
          <div class="panel-body">
		<center><font size=3><em><strong>Department List:</strong></em><br>Mens Shoes<br>Womens Shoes<br>Mens Clothing<br>Womens Clothing<br>
		Accessories<br>Mens Cologne<br>Womens Fragrance</font></center>
		</div>
      </div>
    </div>
  </div>
</div>
		</tr>
    <tbody>
      <div class="search" align="center">

		<form action="search.php?searching=true" method="POST">
		<input type="text" name="searchcategory" value="" style="width: 200px; height: 35px"/>
		<input type="submit" value="Search" style="width: 200px; height: 35px; background-color: #1376b8; color: white; font-size: larger"/>
		</form>
	</div>
<table border="7" bordercolor="#1376b8" align='center'>
	<?php
	if('searching'==true && isset($_REQUEST['searchcategory'])){


	$sql=$db->prepare("SELECT * FROM item WHERE
	ITEM_DEPARTMENT LIKE :category
	OR ITEM_NAME LIKE :category
	OR ITEM_BRAND LIKE :category
	OR ITEM_PRICE LIKE :category
	OR ITEM_COLOR LIKE :category");

		$sql->execute(array(':category'=> $_REQUEST['searchcategory']));
		echo "<th bgcolor='#1376b8'><center><font size='5' color='white'><em>Name</em></font></center></th>
			<th bgcolor='#1376b8'><em><center><font size='5' color='white'>Brand</em></font></center></th>
			<th bgcolor='#1376b8'><em><center><font size='5' color='white'>Color</em></font></center></th>
			<th bgcolor='#1376b8'><em><center><font size='5' color='white'>Department</em></font></center></th>
			<th bgcolor='#1376b8'><em><center><font size='5' color='white'>Price</em></font></center></th>
			<th bgcolor='#1376b8'><em><center><font size='5' color='white'>Action</em></font></center></th>";


	?>
	<?php
    while ($row=$sql->fetch())
    {
		?>

       <tr>
				<td bgcolor="#FFFFFF"> <center><font size='5'><?php echo $row['ITEM_NAME']?></font></center></td>
				<td bgcolor="#FFFFFF"> <center><font size='5'><?php echo $row['ITEM_BRAND']?></font></center></td>
				<td bgcolor="#FFFFFF"> <center><font size='5'><?php echo $row['ITEM_COLOR']?></font></center></td>
				<td bgcolor="#FFFFFF"> <center><font size='5'><?php echo $row['ITEM_DEPARTMENT']?></font></center></td>
				<td bgcolor="#FFFFFF"> <center><font size='5'><?php echo $row['ITEM_PRICE']?></font></center></td></td>
				<td bgcolor="#FFFFFF"> <center><a href="add-to-cart.php?id=<?php echo $row['ITEM_NUMBER'] ?>"><font size='4'>Add to cart</font></a></center></td>
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
