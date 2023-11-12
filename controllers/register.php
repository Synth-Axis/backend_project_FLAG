<?php

require("models/users.php");
require("Core/basefunctions.php");

$message = "";
$code = "";
$email = "";
$username = "";

$modelUsers = new Users();

if (isset($_POST["send"])){

    foreach($_POST as $key => $value){
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if($_POST["captchaText"] === $_SESSION["captchaText"]) {
        echo "CAPTCHA verification successful!";

        if (
            !empty($_POST["username"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["password"]) &&
            mb_strlen($_POST["username"]) >= 3 &&
            mb_strlen($_POST["username"]) <= 20 &&
            mb_strlen($_POST["password"]) >= 8 &&
            mb_strlen($_POST["password"]) <= 255 &&
            filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
            $_POST["password"] === $_POST["passwordCheck"] &&
            isset($_POST["terms"])
        ){
            $userEmail = $modelUsers->findUserByEmail($_POST["email"]);
    
            if( empty( $userEmail )){
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $modelUsers->RegisterUser( $_POST );
                header("Location: login");
            }
            $message = "Email already exists";
            $username = retainFormData($_POST["username"]);
        }
        else if($_POST["password"] !== $_POST["passwordCheck"]){
            $message = "Passwords do not match";
            $username = retainFormData($_POST["username"]);
            $email = retainFormData($_POST["email"]);
        }
        else {
            $message = "All fields are mandatory";
            $username = retainFormData($_POST["username"]);
            $email = retainFormData($_POST["email"]);
        }
    } 
    else {
        $message = "CAPTCHA verification failed!";
        $username = retainFormData($_POST["username"]);
        $email = retainFormData($_POST["email"]);
    }
}

function retainFormData($formData) {
    $formData = htmlspecialchars(strip_tags(trim($formData)));
    return $formData;
}

$captcha = "/Core/captcha.php";

require ("views/register.php");