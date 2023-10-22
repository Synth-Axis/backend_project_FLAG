<?php

require("models/games.php");
require("models/genres.php");
require("models/platforms.php");
require("models/ratings.php");

$modelGames = new Games();

$games = $modelGames->getAllGames();

$modelRatings = new Ratings();

function topRatedGames ($game) {
    $topRated = [];
    foreach ($games as $game){
        $topRatings = $modelGames->getAverageRatings($game);
        $topRated[] = $topRatings;
    }
    if (empty($topRated)){
        echo ("No games found");
    }
    return $topRated;
}

$modelGenres = new Genres();

$genres = $modelGenres->getAll();

if( empty($genres)){
    http_response_code(404);
    die("Not found");
}

$modelPlatforms = new Platforms();

$platforms = $modelPlatforms->getPlatforms();

if( empty($platforms)){
    http_response_code(404);
    die("Not found");
}

require("views/topgames.php");
