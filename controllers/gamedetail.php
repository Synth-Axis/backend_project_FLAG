<?php

require("Core\corepageconfig.php");
require("Core\basefunctions.php");

require("models/ratings.php");
$modelRatings = new Ratings();

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    require("views/errors/400.php");
    exit;
}

$game = $modelGames->getGameDetail($id);
if( empty($game)){
    http_response_code(404);
    require("views/errors/404.php");
    exit;
}

$games = $modelGames->getAllGames();

foreach ( $platforms as $key => $platform ) {
    $gameData[$id]["platforms"] = $modelPlatforms->findPlatformsByGame($id);
}

$rating = $modelRatings->getAverageRatingById($game["game_id"]);

require ("views/gamedetail.php");