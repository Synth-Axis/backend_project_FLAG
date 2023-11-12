<?php

require("models/users.php");
require("Core/basefunctions.php");

$message = "";

$modelUsers = new Users();

if (isset($_POST["recoverPass"])){
    if($_POST["password"] === $_POST["passwordCheck"]){
        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $modelUsers->updatePassword( $_POST["password"], $_SESSION["user_id"] );
        $modelUsers->setPasswordToken( "", $_SESSION["user_id"] );
        header("Location: login");
    }
    else{
        $message = "Passwords do not match";
    }
}

require("views/recoverypage.php");