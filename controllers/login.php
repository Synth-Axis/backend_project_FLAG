<?php

$message = "";

if( isset($_POST["send"])){

    foreach($_POST as $key => $value){
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if (
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 255 &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ){
        require("models/users.php");
        $model = new Users();

        $currentUser = $model->findUserByEmail($_POST["email"]);

        if ( !empty( $currentUser ) ){
            $userPassword = $currentUser["password"];
            if (password_verify($_POST["password"], $userPassword)) {
                $_SESSION["user_id"] = $currentUser["user_id"];

                if( $currentUser["user_type"] === "admin"){
                    header("Location: /admin");
                }
                else {
                    header("Location: /");
                }
            }
            else{
                $message = "Password is not valid";
            }             
        }
        else {
            $message = "Email is not registered";
        }  
    }
    else {
        $message = "Please fill the form correctly!";
    }
}

function showMessage ($message){
    if( isset($message)){
        echo '<p role="alert">' .$message. '</p>';
        } 
}

require("views/login.php");
