


<?php require_once "../partials/header.php"; ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 


	$email= $_POST['email'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM tbl_users WHERE emailadd = '$email' AND psword = '$password'";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);

	if ($count == 1 ) {
		 // echo "Success";
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
	else
	{
		echo "user account is invalid";

	}	
?>



