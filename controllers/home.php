<?php

require("models/games.php");
require("models/genres.php");
require("models/platforms.php");
require("models/users.php");
require("models/owned_games.php");

$modelUsers = new Users();
$modelOwnedGames = new OwnedGames();


if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $ownedGamesCount = $modelOwnedGames->getGamesCount($currentUser["user_id"]);
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

if (isset($_POST["send"])){

    if (!empty($currentUser)){
        $modelOwnedGames->updateUsersGames( $currentUser["user_id"], $_POST["game_id"]);
    }
    else{
    $message = "You must be logged in";
    }
}

require("views/home.php");
