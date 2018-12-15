<?php 
	
	$host = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "db_tshirt";

	//create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	//check connection
	if (!$conn) {
		die("Connection failed:".mysqli_error($conn));
	}

?>