<?php session_start(); ?>
<?php require_once "../controllers/connect.php"; ?>

<?php 
	//Get values from login form
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
?>
<?php require_once "../controllers/connect.php"; ?>

	// Check if we are getting the correct values
	// echo $email. " - " .$password;



	// //Database info
	// $host = "localhost";
	// $db_username = "root";
	// $db_password = "";
	// $db_name = "demoStoreNew";

	// //create connection
	// $conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	// //check connection
	// if (!$conn) {
	// 	die("Connection failed:".mysqli_error($conn));
	// }


<?php

	$sql = "SELECT * FROM tbl_users WHERE emailadd = '$email' && psword = '$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			// echo $row['lname'];
			// echo "<br>";
			// echo $row['fname'];

			 $_SESSION['email'] = $row['emailadd'];
			// $_SESSION['lastname'] = $row['lname'];
			// $_SESSION['firstname'] = $row['fname'];
		}
		header("Location: ../views/index.php");
	}


?>