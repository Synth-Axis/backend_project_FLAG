<?php

require("models/users.php");

$modelUsers = new Users();

$users = $modelUsers->getAllUsers();

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $loggedUser = $modelUsers->findUserById($currentUser["user_id"]);

    if($loggedUser["user_type"] !== "admin"){
        http_response_code(403);
        require("views/errors/403.php");
        exit;
    }
    else{
        $users = $modelUsers->getAllUsers();
    }
}
else{
    http_response_code(403);
    require("views/errors/403.php");
    exit;
}

require("views/adminusers.php");