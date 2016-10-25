<?php
/**
 * Envio de email de contacto
*/

// Dependencias
require_once dirname(__FILE__) . '/' . 'phpmailer/PHPMailerAutoload.php';

// 
function parse($str){
	return mb_strtolower(trim($str));
}

// Variables
$nombre				= ucwords(parse($_POST['template-contactform-nombre']));
$email				= parse($_POST['template-contactform-email']);
$is_valid_email		= $mail->validateAddress($email);
$telefono			= parse($_POST['template-contactform-phone']);
$subject			= ucfirst(parse($_POST['template-contactform-subject']));
$mensaje			= ucfirst(parse($_POST['template-contactform-message']));


$mail = new PHPMailer();

// Globales
$mail->isHTML(true);
$mail->Encoding 	= 'quoted-printable';
$mail->CharSet 		= 'utf-8';
$mail->WordWrap 	= 70;

// To
$mail->addAddress('info@loneracrovara.com', 'Lonera Crovara');

// From
$mail->setFrom($email, $nombre);

$mail->Subject 		= $subject;
$mail->Body 		= $mensaje;

return ( $mail->send() )? 'OK' : $mail->ErrorInfo;
?>