<?php

require("models/users.php");
require("Core/basefunctions.php");

$message = "";
$user = "";

$modelUsers = new Users();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"]) && isset($_GET["token"])) {
    $email = $_GET["email"];
    $token = $_GET["token"];
    $user = $modelUsers->findUserByEmail($email);
    $dbToken = $user["password_token"];
    if($token !== $dbToken) {
        http_response_code(403);
        die("Not a valid Token");
    }
    $_SESSION["user_id"] = $user["user_id"];
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["password"] === $_POST["passwordCheck"]){
        $newPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $modelUsers->updatePassword( $newPassword, $_SESSION["user_id"] );
        $modelUsers->setPasswordToken( "", $_SESSION["user_id"] );
        unset($_SESSION["user_id"]);
        header("Location: login");
    }
    else{
        $message = "Passwords do not match";
    }
}


require("views/recoverypage.php");










