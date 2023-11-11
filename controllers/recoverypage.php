<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"]) && isset($_GET["token"])) {
    $email = $_GET["email"];
    $token = $_GET["token"];

    $user = $modelUsers->findUserByEmail($email);

    if($token === $user["password_token"]){
        require("views/recoverypage.php");
    }
} else{
    http_response_code(403);
    die("Forbidden");
}