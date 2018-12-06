<?php

	include 'connect.php';
	$email = $_POST["email"];
	$data ="";


	$sql = "SELECT * FROM tbl_users WHERE emailadd ='$email'";


	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			$data = "Email already Exists";
		}
	}
	else
		{
			$data = "Email is Available";
		}


	echo $data;
?>