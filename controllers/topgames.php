<?php

require("models/games.php");
require("models/genres.php");
require("models/platforms.php");
require("models/ratings.php");

$modelGames = new Games();

$games = $modelGames->getAllGames();

$modelRatings = new Ratings();

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


foreach ( $games as $key => $game ) {
    $games[$key]["averageScore"] = $modelRatings->getAverageRatings($game["game_id"]);
}

echo "<pre>";
var_dump($games);
echo "</pre>";


require("views/topgames.php");
