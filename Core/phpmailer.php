<?php

require ("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($subject, $message){

$mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = 2;

        $mail->isSMTP();
        $mail->Host = "smtp-relay.brevo.com";
        $mail->SMTPAuth = true;
        $mail->Username = ENV["PHPMAILER_USERNAME"];
        $mail->Password = ENV["PHPMAILER_PASSWORD"];
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->setFrom("synthphp@gmail.com", "Games Inc");
        $mail->addAddress("synthphp@gmail.com", "Synthaxis");

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}