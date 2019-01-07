<?php session_start();?>
<?php
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
	require "connect.php";

	$users_id = $_SESSION['usersid'];
	$timeManila = date_default_timezone_set('Asia/Manila');
	$purchase_date = date('F j, Y, H:i');
	$_SESSION['purchase_date'] = $purchase_date;
	$length = 10;
	$today = date('mdygis');
	$trans = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,$length);
	$transaction_code = $today."-".$trans;
	$shipping_address = $_POST['shipping_address'];
  $payment_mode = $_POST['payment_mode'];
  	$sizes = "1";


	// echo $transaction_code;

if($payment_mode == 2){

	$sql = "INSERT INTO tbl_orders(user_id,transaction_code,purchase_date,status_id,payment_mode_id,shipping_address)

	VALUES('$user_id','$transaction_code','$purchase_date','1','$payment_mode','$shipping_address')";

	$result = mysqli_query($conn,$sql);

	$_SESSION['transaction_code'] = $transaction_code;

	if(!$result){

		die("Connection failed:". mysqli_error($conn));
		
	}else{
		 $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $grand_total = $_SESSION['grand_total'];
		$staff_email = "ricafranca@rocketmail.com"; // where the email is comming from
		$users_email =  $_SESSION['email']; //Where the email will go
		$email_subject = "Your transaction code : $transaction_code";
		$email_body = "
					<h1>Thank you for shopping!</h1>

					<p>Your order will be delivered in 5-7 days in $shipping_address.</p>

					<small>Transaction reference:$transaction_code</small>
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
			$mail->Password = "bherna10";
			$mail->SMTPSecure = "tls";
			$mail->Port = 587;
			$mail->setFrom($staff_email,"Order Support");
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

	echo $users_id;
	echo "<br>";
	echo $purchase_date;
	echo "<br>";
	echo $transaction_code;

	

	// new sql to insert order_items

$_SESSION['cart'];
$_SESSION['grand_total'] = $grand_total;

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'ATMCFcyrjqSe3OQw2Br0cgdadE1lQT0SxWWF5d-r0yteGKJi9tMO7njT_kckHM2tirDcJ-z8N8GUXFg_',
		'EH1iZSQ0YIy6mIjfKxJqylU5Rs3ysnKqW9uO1fnjQjizlKKOo3Lqz9wQi4t6ZyaBwxJPgASzfFDWOlmr'
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
                     $sql2 = "INSERT INTO tbl_order_items(order_id,item_id,quantity,sizes,price)

					VALUES('$lastId','$id','$quantity','$sizes','$subTotal')";

					$result2 = mysqli_query($conn,$sql2);
                   
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
			 ->setInvoiceNumber(uniqid("demoStoreNew-"));

//where to go after\
$redirectUrls = new RedirectUrls();
$redirectUrls
	//Create successful file
	->setReturnUrl('https://localhost/lloyd/racquetscience/app/views/confirmation.php')
	//Create unsuccessful file
	->setCancelUrl('https://localhost/lloyd/racquetscience/app/views/account.php');

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
    	$sql = "INSERT INTO orders(users_id,transaction_code,purchase_date,status_id,payment_mode_id,shipping_address)

	VALUES('$users_id','$transaction_code','$purchase_date','1','$payment_mode','$shipping_address')";

	$result = mysqli_query($conn,$sql);

	$_SESSION['transaction_code'] = $transaction_code;

	if(!$result){

		die("Connection failed:". mysqli_error($conn));
		
	}else{
		 
		 echo "Order has been placed";
	}

	// last id to use for order_items
	$lastId = mysqli_insert_id($conn);

	echo $users_id;
	echo "<br>";
	echo $purchase_date;
	echo "<br>";
	echo $transaction_code;

	

	// new sql to insert order_items

$_SESSION['cart'];

foreach($_SESSION['cart'] as $id=> $quantity) {
   $sql1 = "SELECT * FROM items where id = '$id' ";
             $result1 = mysqli_query($conn, $sql1);
               if(mysqli_num_rows($result1) > 0){
                   while($row = mysqli_fetch_assoc($result1)){
                   	 
                     $price = $row["price"];
                     $subTotal = $quantity * $price;

                     // echo $id;
                     // echo $quantity;
                     // echo $subTotal;
                     // echo "<br>";

                     $sql2 = "INSERT INTO orders_items(order_id,item_id,quantity,price)

					VALUES('$lastId','$id','$quantity','$subTotal')";

					$result2 = mysqli_query($conn,$sql2);
                   
                   }
               }
		}

 

  if(!$result){

    die("Connection failed:". mysqli_error($conn));
    
  }else{
     $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $grand_total = $_SESSION['grand_total'];
    $staff_email = "theracquetscience@gmail.com"; // where the email is comming from
    $users_email =  $_SESSION['email']; //Where the email will go
    $email_subject = "Your transaction code : $transaction_code";
    $email_body = "
          <h1>Thank you for shopping!</h1>

          <p>Your order will be delivered in 5-7 days in $shipping_address.</p>

          <small>Transaction reference:$transaction_code</small>
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
      $mail->Password = "Orders1120";
      $mail->SMTPSecure = "tls";
      $mail->Port = 587;
      $mail->setFrom($staff_email,"Order Support");
      $mail->addAddress($users_email);
      $mail->isHTML(true);
      $mail->Subject = $email_subject;
      $mail->Body = $email_body;
      $mail->send();

      echo "message sent";


    }catch(Exception $e){
      echo "message sending failed!".$mail->ErrorInfo;
    }
     header("Location: ../views/confirmation.php");
  }

}


?>
<?php unset($_SESSION['cart'], $_SESSION['item_count']);