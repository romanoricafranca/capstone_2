<?php

	include 'connect.php';
	$email = $_POST["email"];
	$data ="";


	$sql = "SELECT * FROM tbl_users WHERE email ='$email'";


	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			$data = "Email already Exists";	
		}
	}
	else
	{
		// $email = test_input($_POST["email"]);
		// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		// 	{
  // 			$data = "Invalid email format"; 
		//  	} else
		if($email == "")
		{
			$data = "Needs Email Address";
		}
		else
		{
			$data ="Email is Available";
		}
	}

	echo $data;
?>