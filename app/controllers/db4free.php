<?php 
	
	$host = "db4free.net";
	$db_username = "tbl_shirtee";
	$db_password = "tularansimanoy05";
	$db_name = "shirtee";

	//create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	//check connection
	if (!$conn) {
		die("Connection failed:".mysqli_error($conn));
	}

?>