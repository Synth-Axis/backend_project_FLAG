<?php

require("models/games.php");
require("models/genres.php");
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

foreach ( $games as $platforms_games) {
    
    foreach ($platforms_games as $platform){
        $platformsByGame = $modelPlatforms->findPlatformsByGame($platforms_games["game_id"]);
    }
}
require("views/home.php");
