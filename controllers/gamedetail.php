<?php

require("models/owned_games.php");
require("models/users.php");
require("models/genres.php");
require("models/platforms.php");
require("models/games.php");

$modelOwnedGames = new OwnedGames();
$modelUsers = new Users();
$modelGenres = new Genres();
$modelPlatforms = new Platforms();
$modelGames = new Games();

$genres = $modelGenres->getAll();
$platforms = $modelPlatforms->getPlatforms();

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

if( empty($genres)){
    http_response_code(404);
    die("Not found");
}

if( empty($platforms)){
    http_response_code(404);
    die("Not found");
}

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $ownedGamesCount = $modelOwnedGames->getGamesCount($currentUser["user_id"]);
}

$game = $modelGames->getGameDetail($id);
if( empty($game)){
    http_response_code(404);
    die("Não encontrado");
}

require ("views/gamedetail.php");