<?php

require_once 'connect.php';

$item_name = htmlspecialchars($_POST['name']);
$item_price = htmlspecialchars($_POST['price']);
$item_desc = htmlspecialchars($_POST['description']);
$category = $_POST['choose'];

if ($category == 'Astronaut') {
$path = "../assets/image/astronaut/";
$cat_id = 1;
}
if ($category == 'Animals') {
$path = "../assets/image/animals/";
$cat_id = 2;
}
if ($category == 'Aliens') {
$path = "../assets/image/aliens/";
$cat_id = 3;
}

$target_file = $path . basename($_FILES['upload']['name']);

$sql = "INSERT INTO tbl_items(name,price,description,img_path,category_id) VALUES('$item_name', '$item_price', '$item_desc', '$target_file', '$cat_id')";

$result = mysqli_query($conn,$sql);

if ($result) {
move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
header("Location: ../views/admin_add_item.php");
}

?>