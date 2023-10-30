<?php

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

require("models/users.php");

$model = new Users();

$user = $model->findUserById($id);

if( empty($user)){
    http_response_code(404);
    die("Não encontrado");
}

if ( !empty($_POST["username"])){
    $model->updateUsername( $_POST, $id );
}

if ( !empty($_POST["email"])){
    $model->updateUserEmail( $_POST, $id );
}

require ("views/userdetail.php");