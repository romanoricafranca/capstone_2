<?php
session_start();

$id = $_POST["productId"];
//unset()

unset($_SESSION["cart"][$id]);
$_SESSION["item_count"]= array_sum($_SESSION["cart"]);


echo "<i class='fas fa-shopping-cart'></i>Cart<span class='badge badge-danger'>".$_SESSION['item_count']."</span>";


if ($_SESSION['item_count']  == 0) {
	unset($_SESSION['item_count'],$_SESSION['cart']);
}

?>