<?php


require("models/users.php");

$modelUsers = new Users();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["user_email"];
    $user = $modelUsers->findUserByEmail($email);

    $token = bin2hex(random_bytes(32));
    $modelUsers->setPasswordToken($token, $user["user_id"]);
    
    $subject = "Password Reset";
    $message = "Click the following link to reset your password: 
                localhost/recoverypage.php?email=$email&token=$token";
    require("Core/phpmailer.php");
    sendEmail($subject, $message);
}

require ("views/recoverpassword.php");