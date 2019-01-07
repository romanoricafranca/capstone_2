<?php
		
	session_start();
	require_once 'connect.php';

	
	$id = $_POST["productId"];
	$quantity = $_POST["quantity"];

	//update the items for session cart variable
	$_SESSION["cart"][$id] = $quantity;
	$_SESSION["item_count"] = array_sum($_SESSION["cart"]);


	echo "<i class='fas fa-shopping-cart'></i>Cart<span class='badge badge-danger'>".$_SESSION['item_count']."</span>";


?>