<?php

	include 'connect.php';
	
	$lname = ucfirst($_POST['lname']);
	$fname = ucfirst($_POST['fname']);
	$email = $_POST['email'];	
	$password = sha1($_POST['password']);
	$address = $_POST['address'];

	//SHA1 = secured hash algorithm 40 characters
	//MD5 = message digest 5

	$sql = "INSERT INTO tbl_users (lname, fname, email, pw, address) VALUES('$lname', '$fname', '$email', '$password', '$address')";

	$result = mysqli_query($conn, $sql);

	if ($result) {
		
		header("Location: ../views/index.php");
	}
	else
	{
		echo mysqli_error($conn);
	}


	
?>