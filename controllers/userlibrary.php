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

if (isset($_SESSION["user_id"])){
$gamesOwned = $modelOwnedGames->getGamesByOwner($currentUser["user_id"]);
}

if (isset($_POST["send"])){
    $modelOwnedGames->removeGameFromOwned($_SESSION["user_id"], $_POST["game_id"]);
}

require("views/userlibrary.php");