<?php

require("models/users.php");

$message = "";

$modelUsers = new Users();

if (isset ($_POST["send"])){

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
        $userEmail = $modelUsers->ValidateEmail($_POST["email"]);

        if( empty( $userEmail )){
            $modelUsers->RegisterUser( $_POST );
            header("Location: login");
        }
        $message = "Email already exists";
    }
    else{
        $message = "Please fill the form correctly";
    }

}

function showMessage ($message){
    if( isset($message)){
        echo '<p role="alert">' .$message. '</p>';
        } 
} 

require ("views/register.php");