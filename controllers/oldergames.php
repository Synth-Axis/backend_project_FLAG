<?php

require("Core\corepageconfig.php");
require("Core\basefunctions.php");

$message = "";

$games = $modelGames->getPreviousGames();

if( empty($games)){
    http_response_code(404);
    require("views/errors/404.php");
    exit;
}

foreach ( $games as $key => $game){
    $games[$key]["platforms"] = $modelPlatforms->findPlatformsByGame($game["game_id"]);
}

require("views/oldergames.php");
