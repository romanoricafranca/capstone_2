<?php session_start(); ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 
	
	$orderId = $_POST['orderId'];

	$sql = "UPDATE tbl_orders SET status_id = 2 WHERE id = '$orderId' ";

	$result = mysqli_query($conn,$sql);

?>