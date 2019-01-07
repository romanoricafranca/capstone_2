<?php
	require_once "../app/controllers/connect.php";

	session_start();
	$trans = $_SESSION['trans'];
	$email = $_POST['email'];


	//app/sample_mail.php
	require "autoload.php";
	

	// use PHPMailer\PHPMailer;
	// use PHPMailer\Exception;	

	require "phpmailer/phpmailer/src/PHPMailer.php";
	require "phpmailer/phpmailer/src/Exception.php";

	//require the ff: files PHPMailer.php, Exception.php, autoload.php

	$mail = new PHPMailer\PHPMailer\PHPMailer(true);

	$staff_email = "dummyaccount@gmail.com"; // where the email is coming from

	$users_email = "ricafrancaromano@gmail.com";//where the email will go

	$email_subject = "CSP2 Order Confirmation";
	$email_body = "<h3>Reference Number: 1234512345-1213123</h3>";
	
	try 
	{
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = $staff_email;
		$mail->Password = "test_1234";
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->setFrom($staff_email, "Company Name");
		$mail->addAddress($users_email);
		$mail->isHTML(true);
		$mail->Subject = $email_subject;
		$mail->Body = $email_body;
		$mail->send();
		echo "Message Has been sent";
	}

	catch(Exception $e)
	{
		echo "Message sending failed". $mail->ErrorInfo;
	}

?>
