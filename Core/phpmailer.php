<?php

require ("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($subject, $message, $user_email, $user_name){

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp-relay.brevo.com";
        $mail->SMTPAuth = true;
        $mail->Username = ENV["PHPMAILER_USERNAME"];
        $mail->Password = ENV["PHPMAILER_PASSWORD"];
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->setFrom("synthphp@gmail.com", "Games Inc");
        $mail->addAddress($user_email, $user_name);

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}