<?php

require("models/games.php");
require("models/genres.php");
require("models/platforms.php");
require("models/owned_games.php");
require("models/users.php");

$modelOwnedGames = new OwnedGames();
$modelUsers = new Users();


if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $ownedGamesCount = $modelOwnedGames->getGamesCount($currentUser["user_id"]);
    $gamesOwned = $modelOwnedGames->getGamesByOwner($currentUser["user_id"]);
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

if (isset($_POST["send"])){
    $modelOwnedGames->removeGameFromOwned($_SESSION["user_id"], $_POST["game_id"]);
}

require("views/userlibrary.php");