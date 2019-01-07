
<?php session_start(); ?>
<?php require_once "connect.php"; ?>

<?php

$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$addr = htmlspecialchars($_POST['address']);
$pass = sha1($_POST['password']);
$users_id = $_SESSION['usersid'];


$sql = "UPDATE tbl_users SET fname = '$fname', lname = '$lname', address = '$addr', email = '$email', pw = '$pass' WHERE id = '$users_id' ";

$result = mysqli_query($conn,$sql);

if ($result) {
session_start();
session_destroy();
header("Location: ../views/login.php");
}
else {
echo mysqli_error($conn);
}
?>