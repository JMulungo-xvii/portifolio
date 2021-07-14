<?php

require_once('phpmailer/PHPMailer.php');
require_once('phpmailer/SMTP.php');
require_once('phpmailer/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

	
 
 if((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['subject']) && !empty(trim($_POST['subject'])))) {
 
	$name = !empty($_POST['name']) ? $_POST['name'] : 'Não informado';
	$email = $_POST['email'];
	$cell= $_POST['cell'];
	$subject = $_POST['subject'];
	$message  = !empty($_POST['message']) ? utf8_decode($_POST['message']) : 'Não informado';
	
	$data = date('d/m/Y H:i:s');
 
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'angelamarressane@gmail.com';
	$mail->Password = '9404nana*';
	$mail->Port = 587;
 
	$mail->setFrom('angelamarressane@gmail.com');
	$mail->addAddress('angelamarressane@gmail.com');
 
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = "Nome: {$name}<br>
				   Email: {$email}<br>
				   Contacto: {$cell}<br>
				   Message: {$message}<br>
				   Data/hora: {$data}";
 
	if($mail->send()) {
		// echo 'Email enviado com sucesso.';
echo "<script> alert('Email enviado com sucesso.'');</script>";
	
	} else {
		// echo 'Email não enviadoo.';
		echo "<script> alert('ERRO! Email nao enviado.'');</script>";
	}
} else {
	// echo 'Não enviado: informar o email e a message.';

echo "<script> alert('Não enviado: informar o email e a message..'');</script>";
}