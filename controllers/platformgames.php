<?php

require("models/users.php");
require("models/genres.php");
require("models/owned_games.php");
require("models/platforms.php");
require("models/games.php");

$modelGames = new Games();
$modelGenres = new Genres();
$modelOwnedGames = new OwnedGames();
$modelPlatforms = new Platforms();
$modelUsers = new Users();

$genres = $modelGenres->getAll();
$platforms = $modelPlatforms->getPlatforms();

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

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

foreach ( $platforms as $key => $platform ) {
    $platforms[$key]["games"] = $modelGames->findGamesByPlatform($id);
}

if (isset($_POST["send"])){

    if (!empty($currentUser)){
        $modelOwnedGames->updateUsersGames( $currentUser["user_id"], $_POST["game_id"]);
    }
    else{
    $message = "You must be logged in";
    }
}

require ("views/platformgames.php");

