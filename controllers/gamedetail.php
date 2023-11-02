<?php

require("Core\corepageconfig.php");
require("Core\basefunctions.php");

$message = "";

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

$game = $modelGames->getGameDetail($id);
if( empty($game)){
    http_response_code(404);
    die("Não encontrado");
}

if (isset($_POST["send"])){

    if (!empty($currentUser)){
        $modelOwnedGames->updateUsersGames( $currentUser["user_id"], $_POST["game_id"]);
    }
    else{
    $message = "You must be logged in";
    }
}

require ("views/gamedetail.php");