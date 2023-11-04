<?php

require("Core\corepageconfig.php");
require("Core\basefunctions.php");

$message = "";

$games = $modelGames->getAllGames();

if( empty($games)){
    http_response_code(404);
    die("Not found");
}

foreach ( $games as $key => $game ) {
    $games[$key]["platforms"] = $modelPlatforms->findPlatformsByGame($game["game_id"]);
}

require("views/home.php");
