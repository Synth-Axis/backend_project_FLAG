<?php

require("models/users.php");
require("Core/basefunctions.php");

$modelUsers = new Users();

$user = $modelUsers->findUserById($id);

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    require("views/errors/400.php");
    exit;
}

if( empty($user)){
    http_response_code(404);
    require("views/errors/404.php");
    exit;
}

if ( isset($_POST["sendUser"])){
    $modelUsers->updateUsername( $_POST["username"], $id );
}

if ( isset($_POST["sendEmail"])){
    $modelUsers->updateUserEmail( $_POST["email"], $id );
}

if ( isset($_POST["deleteAccount"])){
    $modelUsers->deleteAccount( $_POST["user_id"] );
    header("Location: /admin");
}

require ("views/userdetail.php");