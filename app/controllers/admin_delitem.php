<?php require_once "../controllers/connect.php"; ?>


<?php 
	
	$orderId = $_POST['orderId'];

	$sql2 = "SELECT img_path from tbl_items where id ='$orderId'";

	$result2 = mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result2)){
		while ($row = mysqli_fetch_assoc($result2)) {
			unlink($row['img_path']);
		}
	}

	$sql = "DELETE FROM tbl_items WHERE id = '$orderId' ";

	$result = mysqli_query($conn,$sql);

?>