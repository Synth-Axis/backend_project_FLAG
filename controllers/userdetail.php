<?php

require("models/users.php");
require("Core/basefunctions.php");

$modelUsers = new Users();

$user = $modelUsers->findUserById($id);

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

if( empty($user)){
    http_response_code(404);
    die("Não encontrado");
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