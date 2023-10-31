<?php

require("models/users.php");

$message = "";

function showMessage ($message){
    if( isset($message)){
        echo '<p role="alert">' .$message. '</p>';
        } 
} 

$modelUsers = new Users();

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
}

if (isset($_POST["send"])){
    if(!empty($_POST["email"]) && empty($_POST["password"])){
        $message = "To change the email the password is required";
    }
    else {
        if(empty($_POST["username"])){
            $_POST["username"] = $currentUser["username"];
        }
        if(empty($_POST["email"])){
            $_POST["email"] = $currentUser["email"];
        }
        if(empty($_POST["password"])){
            $_POST["password"] = $currentUser["password"];
        }
        else if(!empty($_POST["password"])){
            $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
        $modelUsers->updateUserInfo($_POST, $_SESSION["user_id"]);
    }
}

require("views/useraccount.php");