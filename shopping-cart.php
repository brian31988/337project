<?php
$page = "cart";
include 'header.php';
?>

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

<div class="container">
     <div class="row">
  <div class="col-xs-12">
  <table class="table table-striped">
<thead>
      <tr>
        <th><font size='4'>Cart Items</font></th>
      </tr>
    </thead>
    <tbody>
<?php
if(isset($_SESSION['cart']))
{

?>
<table border="7" bordercolor="#1376b8" align="center">
	<?php

		echo "<th bgcolor='#1376b8'><center><font size='5' color='white'><em>Name</em></font></th>
			<th bgcolor='#1376b8'><center><font size='5' color='white'><em>Brand</em></font></th>
			<th bgcolor='#1376b8'><center><font size='5' color='white'><em>Color</em></font></th>
			<th bgcolor='#1376b8'><center><font size='5' color='white'><em>Department</em></font></th>
			<th bgcolor='#1376b8'><center><font size='5' color='white'><em>Price</em></font></th>";


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
				<td bgcolor="#FFFFFF"><center><font size='5'><?php echo $row['ITEM_NAME']?></font></center></td>
				<td bgcolor="#FFFFFF"><center><font size='5'><?php echo $row['ITEM_BRAND']?></font></center></td>
				<td bgcolor="#FFFFFF"><center><font size='5'><?php echo $row['ITEM_COLOR']?></font></center></td>
				<td bgcolor="#FFFFFF"><center><font size='5'><?php echo $row['ITEM_DEPARTMENT']?></font></center></td>
				<td bgcolor="#FFFFFF"><center><font size='5'><?php echo $row['ITEM_PRICE']?></font></center></td>
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
echo "<div class='container' >
  <div class='row' style= 'width: 350px;'>
    <div class='col-xs-12'>
      <div class='panel panel-primary'>
        <div class='panel-heading'><center><font size=4>Total Price</font></center></div>
          <div class='panel-body'>
		<p><font size ='5'>$" . $total . "</font></p>
		</div>
      </div>
    </div>
  </div>
</div>";
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


footer{
        font-weight:bold;
        color:black;
        text-align:center;
    }
    .nav-tabs{
      background-color:#f0f0f0;
    }

</style>
