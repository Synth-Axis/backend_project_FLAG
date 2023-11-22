<?php

require("models/platforms.php");

$modelPlatforms = new Platforms();
$platforms = $modelPlatforms->getPlatforms();

require("models/users.php");
$modelUsers = new Users();

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

if ( isset($_POST["send"]) ){
    $modelPlatforms->insertPlatform($_POST["platform_name"]);
    echo "<script>alert('Platform inserted into Database');</script>";
}

require("views/adminplatforms.php");