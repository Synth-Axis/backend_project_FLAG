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
    require("views/errors/404.php");
    exit;
}

$games = $modelGames->getAllGames();

// foreach ( $games as $key => $gameData ) {
//     $gameData["platforms"] = $modelPlatforms->findPlatformsByGame($gameData["game_id"]);
// }

foreach ( $platforms as $key => $platform ) {
    $gameData[$id]["platforms"] = $modelPlatforms->findPlatformsByGame($id);
}

$rating = $modelRatings->getAverageRatingById($game["game_id"]);

require ("views/gamedetail.php");