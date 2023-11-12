<?php

require("models/users.php");
require("Core/basefunctions.php");

$modelUsers = new Users();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"]) && isset($_GET["token"])) {

    $email = $_GET["email"];
    $token = $_GET["token"];

    $user = $modelUsers->findUserByEmail($email);

    $dbToken = $user["password_token"];
    $_SESSION["user_id"] = $user["user_id"];

    if($token === $dbToken) {
        header("Location: /recoverypage");
    }
} else{
    http_response_code(403);
    die("Forbidden");
}