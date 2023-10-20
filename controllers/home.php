<?php

require("models/genres.php");
require("models/games.php");
require("models/platforms.php");

$modelGames = new Games();

$games = $modelGames->getAllGames();

if( empty($games)){
    http_response_code(404);
    die("Not found");
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

$platformsByGame = $modelPlatforms->findPlatformsByGame($gameId);

require("views/home.view.php");
