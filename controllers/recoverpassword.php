<?php

require("models/users.php");
require("Core/basefunctions.php");
require("Core/CSRF.php");

$message = "";
$modelUsers = new Users();

if (!isset($_SESSION["csrf_token"])) {
    generateCSRFToken();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["csrf_token"]) || $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
        die("CSRF token validation failed.");
    }

    $email = $_POST["user_email"];
    $user = $modelUsers->findUserByEmail($email);

    if(empty($user["email"])) {
        $message = "Email is not registered";
    }
    else{
        $token = bin2hex(random_bytes(32));
        $modelUsers->setPasswordToken($token, $user["user_id"]);
        
        $subject = "Password Reset";
        $message = "Click the following link to reset your password:
                    ".ENV["ADDRESS"]."/recoverypage/?email=$email&token=$token";
        require("Core/phpmailer.php");
        sendEmail($subject, $message, $email, $user["username"]);
        $message = "Email sent successfully";
    }
    generateCSRFToken();
}

require ("views/recoverpassword.php");