<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

/**
 * MailTrap driver
 */
email::$services['mailtrap'] = function($email) {

	$mail = new PHPMailer(true);
	
	try {
    //Server settings
    $mail->isSMTP();			// Set mailer to use SMTP
    $mail->SMTPAuth = true;		// Enable SMTP authentication
    $mail->isHTML(true);		// Set email format to HTML
    
    $mail->Host 		= c::get('mailtrap.host', 'smtp.mailtrap.io');  // Specify server
    $mail->Username 	= c::get('mailtrap.username');              	// SMTP username
    $mail->Password 	= c::get('mailtrap.password');              	// SMTP password
    $mail->Port			= c::get('mailtrap.port', 2525);                // TCP port to connect to

	//Sender
    $mail->setFrom($email->from);
    
    //Recipients
    $mail->addAddress($email->to); 
    $mail->addReplyTo($email->replyTo);

    //Content
    $mail->Subject = $email->subject;
    $mail->Body    = $email->body;

    //Send
    $mail->send();

	} catch (Exception $e) {
	    throw new Error('The email could not be sent');
	}


};


