<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                      
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'YOUR_USERNAME';                     
        $mail->Password   = 'YOUR_GMAIL_PASSWORD';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             
        $mail->Port       = 465;                                   

        $mail->setFrom('FROM_EMAIL', 'FROM_NAME');
        $mail->addAddress($to);    

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
