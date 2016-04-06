<?php

session_start();

if(empty($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['id']);

?>

<p>
	Item was successfully added to your cart.<br>
	<a href="shopping-cart.php">View Shopping Cart</a><br>
	<a href="search.php">Return to Search</a>
</p>