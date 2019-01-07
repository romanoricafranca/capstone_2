
<?php session_start(); ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 

$users_id = $_SESSION['usersid'];
$timeManila = date_default_timezone_set('Asia/Manila');
$purchase_date = date('F j, Y, D h:i:s a');
$trans = generate_trans_number();



$sql = "INSERT INTO tbl_orders (user_id, transaction_code, purchase_date, status_id, payment_mode_id)
        VALUES('$users_id','$trans','$purchase_date',1,1)";

$result = mysqli_query($conn, $sql);

//last id to use for order_items
$lastId = mysqli_insert_id($conn);
$_SESSION['cart'];


foreach($_SESSION['cart'] as $id=> $quantity) {
  $sql1 = "SELECT * FROM tbl_items where id = '$id' ";
       $result1 = mysqli_query($conn, $sql1);
              if(mysqli_num_rows($result1) > 0){
                  while($row = mysqli_fetch_assoc($result1)){
                    $id = $row["id"];
                    $name = $row["name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $subTotal = $quantity * $price;
                  

$sql2 = "INSERT INTO tbl_order_items (order_id, item_id, sizes, quantity, price)

        VALUES('$lastId','$id', 1,'$quantity','$subTotal')";


mysqli_query($conn,$sql2);

               	}
           	}
}
$count = mysqli_num_rows($result1);

        if ($count == 1) {

            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['usersid'] = $row['id'];
            }

unset($_SESSION["cart"]);
$_SESSION["item_count"]= array_sum($_SESSION["cart"]);
echo " <i class='fas fa-shopping-cart'></i>Cart
<span class='badge bg-danger'>" . $_SESSION['item_count'] . "</span>";

header("Location: ../views/index.php");

}

?>



<?php
//transaction number generator
function generate_trans_number()
{
$ref_number = '';
$source = array('0','1','2','3','4','5','6','7','8','9','A','a','B','b','C','c','D','d','E','e','F','f');

for ($i = 0; $i < 22; $i++) {
$index = rand(0,21);

$ref_number = $ref_number.$source[$index];

}
$today = getdate();

return $ref_number."-".$today[0];
}


?>