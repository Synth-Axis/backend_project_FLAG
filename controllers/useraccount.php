<?php

require("Core/basefunctions.php");
require("models/users.php");

$message = "";

$modelUsers = new Users();

if (!isset($_SESSION["user_id"])){
    http_response_code(403);
    require("views/errors/403.php");
    exit;
}
else{
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

$allowed_formats = [
    "jpg" => "image/jpeg",
    "png" => "image/png"
];

if ( isset($_POST["sendImage"])) {
    if(
        $_FILES["avatar"]["error"] === 0 &&
        $_FILES["avatar"]["size"] > 0 &&
        $_FILES["avatar"]["size"] <= 2 * 1024 * 1024 &&
        in_array($_FILES["avatar"]["type"], $allowed_formats)
    ) {
        $file_extension = array_search($_FILES["avatar"]["type"], $allowed_formats);
        $filename = date("YmHis") . "_" . mt_rand(100000, 999999) . "." . $file_extension;
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "assets/avatars/" . $filename);

        $imgPath = "assets/avatars/" . $filename;

        $modelUsers->updateUserPhoto($imgPath, $_SESSION["user_id"]); 
    }
}

require("views/useraccount.php");
