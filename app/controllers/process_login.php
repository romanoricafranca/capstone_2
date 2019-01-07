<?php require_once "connect.php"; ?>


<?php 
session_start();


	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND pw = '$password'";

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result); 

	//echo "$count";


	if ($count == 1) {
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['email'] = $row['email'];
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['lname'] = $row['lname'];
			$_SESSION['address'] = $row['address'];
			$_SESSION['usersid'] = $row['id'];
		}

		if ($_SESSION['email'] == "ricafrancaromano@gmail.com") {
			header("Location: ../views/trans_history.php");
		}
		else{

			header("Location: ../views/index.php#test");		
		}
	}
	else
	{
	 	echo "";
	}

?>


