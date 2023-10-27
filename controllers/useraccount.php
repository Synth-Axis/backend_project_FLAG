<?php

require("models/users.php");

//pedir password novamente se for para alterar o email

$modelUsers = new Users();

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
}

if (!empty($_POST)){
    if(empty($_POST["username"])){
        $_POST["username"] = $currentUser["username"];
    }
    if(empty($_POST["email"])){
        $_POST["email"] = $currentUser["email"];
    }
    if(empty($_POST["password"])){
        $_POST["password"] = $currentUser["password"]; //Validar pass
    }
    $modelUsers->updateUserInfo($_POST, $_SESSION["user_id"]);
}
else{
    $message = "There are no fields to update";
}

$message = "";

if(isset($message)){
    echo '<p role="alert">' .$message. '</p>';
}

require("views/useraccount.php");