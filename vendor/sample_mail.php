<?php session_start();?>
<?php

require "autoload.php";

// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;


$users_email = $_SESSION['email'];
$firstname = $_SESSION['firstname'];
$firstname = $_SESSION['lastname'];
$address = $_SESSION['address'];
$transaction_code = $_SESSION['transaction_code'];
$purchase_date = $_SESSION['purchase_date'];
$grand_total = $_SESSION['grand_total'];

require "phpmailer/phpmailer/src/PHPMailer.php";
require "phpmailer/phpmailer/src/Exception.php";
require "autoload.php";

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "theracquetscience@gmail.com"; // where the email is comming from
$users_email =  $_SESSION['email']; //Where the email will go
$email_subject = "Your transaction code : $transaction_code";
$email_body = "
			<h1>Thank you for shopping!</h1>

			<p>Your order will be delivered in 5-7 days in $address.</p>

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



?>