<?php
	require_once 'connect.php';

	$item = $_POST['item'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$id = $_POST['id'];

	$sql = "UPDATE categories SET item = '$item', category = '$category', price = '$price', description = '$description' WHERE id = '$id'";

	$result = mysqli_query($con,$sql);

	if ($result) {
		echo "UPDATED USER!";
	}
?>
