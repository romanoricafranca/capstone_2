<?php require_once "connect.php"; ?>


<?php 
	// session_start();

	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND pw = '$password'";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	echo $count;
	echo $email;
	echo $password;

	if ($count == 1 ) {
		  echo "Success";
		// while($row = mysqli_fetch_assoc($result)){

		// 	echo $row['lname'];
		// 	echo "<br>";
		// 	echo $row['fname'];

			// $_SESSION['email'] = $row['email'];
			// $_SESSION['lname'] = $row['lname'];
			// $_SESSION['fname'] = $row['fname'];
		}
		

	 // header("Location: ../views/index.php#test");
	//}
	// else
	// {
	// 	echo "user account is invalid";

	// }	
?>
