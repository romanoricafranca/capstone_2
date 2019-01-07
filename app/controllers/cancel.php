<?php session_start(); ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 
	
	$orderId = $_POST['orderId'];

	$sql = "UPDATE tbl_orders SET status_id = 3 WHERE id = '$orderId' ";

	$result = mysqli_query($con,$sql);

	if ($result) {
		header("Location: ../views/dashboard.php");
	}
	else {
		echo mysqli_error($conn);
	}

?>