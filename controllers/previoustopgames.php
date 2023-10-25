<?php

require("models/games.php");
require("models/genres.php");
require("models/platforms.php");
require("models/ratings.php");

$modelGames = new Games();

$games = $modelGames->getPreviousTopRated();

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

require("views/previoustopgames.php");