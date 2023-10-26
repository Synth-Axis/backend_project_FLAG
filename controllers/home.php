<?php

require("models/games.php");
require("models/genres.php");
require("models/platforms.php");
require("models/users.php");

$modelUsers = new Users();

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
}

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

foreach ( $games as $key => $game ) {
    $games[$key]["platforms"] = $modelPlatforms->findPlatformsByGame($game["game_id"]);
}


require("views/home.php");
