<?php

require("Core\corepageconfig.php");
require("Core\basefunctions.php");

require("models/ratings.php");
$modelRatings = new Ratings();

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

$game = $modelGames->getGameDetail($id);
if( empty($game)){
    http_response_code(404);
    die("Não encontrado");
}

$games = $modelGames->getAllGames();

foreach ( $games as $key => $gameData ) {
    $gameData["platforms"] = $modelPlatforms->findPlatformsByGame($gameData["game_id"]);
}

$rating = $modelRatings->getAverageRatingById($game["game_id"]);

require ("views/gamedetail.php");