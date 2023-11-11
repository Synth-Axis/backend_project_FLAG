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
        $mail->Host = "smtp-mail.outlook.com";
        $mail->SMTPAuth = true;
        $mail->Username = "synthphp@outlook.pt";
        $mail->Password = "pizza123";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->setFrom("synthphp@outlook.pt", "Games Inc");
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