
<?php session_start(); ?>
<?php

// paypal

require "../../vendor/autoload.php";
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require "../../vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "../../vendor/phpmailer/phpmailer/src/Exception.php";
  // error_reporting(0);

require_once "../controllers/connect.php";


$users_id = $_SESSION['usersid'];
$timeManila = date_default_timezone_set('Asia/Manila');
$purchase_date = date('F j, Y, D h:i:s a');
$trans = generate_trans_number();
$payment_mode = $_POST['payment_mode'];


if($payment_mode == 2){

  $sql = "INSERT INTO tbl_orders(user_id,transaction_code,purchase_date,status_id,payment_mode_id)

  VALUES('$users_id','$trans','$purchase_date',1,'$payment_mode')";

  $result = mysqli_query($conn,$sql);

  if(!$result){

    die("Connection failed:". mysqli_error($conn));
    
  }else{

    $sql2 = "SELECT * FROM tbl_users WHERE id = $users_id";
    $result2 = mysqli_query($conn,$sql2);

    if (mysqli_num_rows($result2) > 0) {
      while ($row = mysqli_fetch_assoc($result2)){

      }
    }


    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $grand_total = $_SESSION['grand_total'];
    $staff_email = "kipstoresupp@gmail.com";//"janjandummy549@gmail.com"; // where the email is comming from
    $users_email =  "ricafrancaromano@gmail.com";//$_SESSION['email']; //Where the email will go
    $email_subject = "Your transaction code : $trans";
    $email_body = "

          <h1>Thank you for shopping!</h1>

          <p>Your order will be delivered in 5-7 days $row[address].</p>

          <small>Transaction reference:$trans</small>
          <br>
          <small>Transaction date:$purchase_date</small>
          <br>
          <small>Grand Total: &#x20B1; $grand_total.00</small>
          <br>

          <p><strong>Order Support Team</strong></p>


        ";


    try{
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = true;
      $mail->Username = $staff_email;
      $mail->Password = "Plankton@06";
      $mail->SMTPSecure = "tls";
      $mail->Port = 587;
      $mail->setFrom($staff_email,"Shirtee's Order Support");
      $mail->addAddress($users_email);
      $mail->isHTML(true);
      $mail->Subject = $email_subject;
      $mail->Body = $email_body;
      $mail->send();

      echo "message sent";


    }catch(Exception $e){
      echo "message sending failed!".$mail->ErrorInfo;
    }
     echo "Order has been placed";
  }

  // last id to use for order_items
  $lastId = mysqli_insert_id($conn);


  // new sql to insert order_items

$_SESSION['cart'];
$_SESSION['grand_total'] = $grand_total;

$apiContext = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
    'ASrQ-XtDYmKUdybf-7prezRhGtWqjTOH9QY1VtX5nCMjWRJUQCvxCqJQo5ZnUmoGIxrKCrqTex3V19Zj',
    'EJyfauiW3CQ56xcqdKO6kJ8W1We6O2hHH5FG8G3-XxME87kE3CqDaorp5V08KYrAQgMWyH1Hx6xM8Z3Y'
  )
);
$payer = new Payer();
$payer->setPaymentMethod('paypal');
//Create array to contain indiviadual items
$items = []; //on loop: $items += [];
$grand_total = 0;
foreach($_SESSION['cart'] as $id=> $quantity) {
//Create every individual item

   $sql1 = "SELECT * FROM tbl_items where id = '$id' ";
             $result1 = mysqli_query($conn, $sql1);
               if(mysqli_num_rows($result1) > 0){
                   while($row = mysqli_fetch_assoc($result1)){
                     $name = $row["name"];
                     $price = $row["price"];
                     $subTotal = $quantity * $price;
                     $grand_total += $subTotal;

$indiv_item = new Item();
$indiv_item ->setName($name)
      ->setCurrency("PHP")
      ->setQuantity($quantity)
      ->setPrice($price); //per item
$items[] = $indiv_item;
                     // echo $id;
                     // echo $quantity;
                     // echo $subTotal;
                     // echo "<br>";
            $sql3 = "INSERT INTO tbl_order_items(order_id,item_id,sizes_id,quantity,price)

          VALUES('$lastId','$id',2,'$quantity','$subTotal')";

          $result3 = mysqli_query($conn,$sql3);
                   
                   }
               }
    }
$item_list  = new ItemList();
$item_list  ->setItems($items);

$amount = new Amount();
$amount ->setCurrency("PHP")
    ->setTotal($grand_total); //grand total

//Create transaction
$transaction = new Transaction();
$transaction ->setAmount($amount)
       ->setItemList($item_list)
       ->setDescription("Transaction from your shop")
       ->setInvoiceNumber(uniqid("shirtee"));

//where to go after\
$redirectUrls = new RedirectUrls();
$redirectUrls
  //Create successful file
  ->setReturnUrl('http://localhost/tutorials/final-cap2-ecom/app/views/confirmation.php')
  //Create unsuccessful file
  ->setCancelUrl('http://localhost/tutorials/final-cap2-ecom/app/views/index.php');

$payment = new Payment();
$payment ->setIntent("sale")
     ->setPayer($payer)
     ->setRedirectUrls($redirectUrls)
     ->setTransactions([$transaction]);

try{
  $payment->create($apiContext);
}catch(Exception $e){
  die($e->getData());
}

$approvalUrl = $payment->getApprovalLink();
header('location: '.$approvalUrl);
}



elseif($payment_mode == 1){
      $sql = "INSERT INTO tbl_orders(user_id,transaction_code,purchase_date,status_id,payment_mode_id)

  VALUES('$users_id','$trans','$purchase_date',1,'$payment_mode')";

  $result = mysqli_query($conn,$sql);


  if(!$result){

    die("Connection failed:". mysqli_error($conn));
    
  }else{
     
     echo "Order has been placed";
  }

  // last id to use for order_items
  $lastId = mysqli_insert_id($conn);


  

  // new sql to insert order_items

$_SESSION['cart'];

foreach($_SESSION['cart'] as $id=> $quantity) {
   $sql1 = "SELECT * FROM tbl_items where id = '$id' ";
             $result1 = mysqli_query($conn, $sql1);
               if(mysqli_num_rows($result1) > 0){
                   while($row = mysqli_fetch_assoc($result1)){
                     
                     $price = $row["price"];
                     $subTotal = $quantity * $price;

                     // echo $id;
                     // echo $quantity;
                     // echo $subTotal;
                     // echo "<br>";
        $sql3 = "INSERT INTO tbl_order_items(order_id,item_id,sizes_id,quantity,price)

          VALUES('$lastId','$id',2,'$quantity','$subTotal')";

          $result3 = mysqli_query($conn,$sql3);
                   
                   }
               }
    }

 

  if(!$result){

    die("Connection failed:". mysqli_error($conn));
    
  }else{


    $sql2 = "SELECT * FROM tbl_users WHERE id = $users_id";
    $result2 = mysqli_query($conn,$sql2);

    if (mysqli_num_rows($result2) > 0) {
      while ($row = mysqli_fetch_assoc($result2)){

}
}
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $grand_total = $_SESSION['grand_total'];
    $staff_email = "kipstoresupp@gmail.com";//"janjandummy549@gmail.com"; // where the email is comming from
    $users_email =  "ricafrancaromano@gmail.com";//$_SESSION['email']; //Where the email will go
    $email_subject = "Your transaction code : $trans";
    $email_body = "
          <h1>Thank you for shopping!</h1>

          <p>Your order will be delivered in 5-7 days in $row[address].</p>

          <small>Transaction reference:$trans</small>
          <br>
          <small>Transaction date:$purchase_date</small>
          <br>
          <small>Grand Total: &#x20B1; $grand_total.00</small>
          <br>

          <p><strong>Order Support Team</strong></p>


        ";

    try{
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = true;
      $mail->Username = $staff_email;
      $mail->Password = "Plankton@06";
      $mail->SMTPSecure = "tls";
      $mail->Port = 587;
      $mail->setFrom($staff_email,"Order Support");
      $mail->addAddress($users_email);
      $mail->isHTML(true);
      $mail->Subject = $email_subject;
      $mail->Body = $email_body;
      $mail->send();

      
      header("Location: ../views/confirmation.php");

    }catch(Exception $e){
      echo "message sending failed!".$mail->ErrorInfo;
    }
     
  }

}

?>
<?php unset($_SESSION['cart'], $_SESSION['item_count']);


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