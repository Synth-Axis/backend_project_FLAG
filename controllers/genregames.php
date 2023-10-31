<?php

require("models/users.php");
require("models/owned_games.php");

$modelOwnedGames = new OwnedGames();
$modelUsers = new Users();

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $ownedGamesCount = $modelOwnedGames->getGamesCount($currentUser["user_id"]);
}


if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $gamesOwned = $modelOwnedGames->getGamesCount($currentUser["user_id"]);
}


if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

require("models/genres.php");
require("models/platforms.php");

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

require("models/games.php");

$modelGames = new Games();

foreach ( $genres as $key => $genre ) {
    $genres[$key]["games"] = $modelGames->findGamesByGenre($genre[("genre_id")]);
}

require ("views/genregames.php");
