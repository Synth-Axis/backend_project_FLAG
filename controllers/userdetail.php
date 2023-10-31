<?php

require("models/users.php");

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
    $model->updateUsername( $_POST["username"], $id );
}

if ( isset($_POST["sendEmail"])){
    $model->updateUserEmail( $_POST["email"], $id );
}

require ("views/userdetail.php");