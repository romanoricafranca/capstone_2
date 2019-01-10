<?php 
	
	$host = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "db_tshirt";

	// $host = "db4free.net";
	// $db_username = "shirtee";
	// $db_password = "#tularansimanoy05";
	// $db_name = "tbl_shirtee";

	//create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	//check connection
	if (!$conn) {
		die("Connection failed:".mysqli_error($conn));
	}

?>