<?php

require("models/genres.php");
require("models/owned_games.php");
require("models/platforms.php");
require("models/users.php");

$modelGenres = new Genres();
$modelOwnedGames = new OwnedGames();
$modelPlatforms = new Platforms();
$modelUsers = new Users();

$genres = $modelGenres->getAll();

if( empty($genres)){
    http_response_code(404);
    die("Not found");
}

$platforms = $modelPlatforms->getPlatforms();

if( empty($platforms)){
    http_response_code(404);
    die("Not found");
}

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $ownedGamesCount = $modelOwnedGames->getGamesCount($currentUser["user_id"]);
}

require("views/genres.php");