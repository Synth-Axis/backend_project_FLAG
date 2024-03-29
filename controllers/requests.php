<?php

header("Content-Type: application/json");

require("Core/basefunctions.php");
require("models/owned_games.php");
require("models/users.php");
require("models/games.php");
require("models/platforms.php");
require("models/genres.php");

if ( $_POST["request"] === "removeGameFromOwned" ){
    $modelOwnedGames = new OwnedGames();
    $modelOwnedGames->removeGameFromOwned($_SESSION["user_id"], $_POST["game_id"]);
    echo '{"message" : "OK"}';
}

if ($_POST["request"] === "addGamesToUserList") {
    if (isset($_SESSION["user_id"])) {
        $modelOwnedGames = new OwnedGames();
        try {
            $modelOwnedGames->updateUsersGames($_SESSION["user_id"], $_POST["game_id"]);
            echo '{"message" : "Game added to User Account"}';
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                echo '{"message" : "This game is already added to the user\'s account"}';
            } else {
                echo '{"message" : "An error occurred while adding the game to the user\'s account"}';
            }
        }
    } else {
        echo '{"message" : "User must be logged in"}';
    }
}

if ($_POST["request"] === "updateUserPhoto") {
    if (isset($_SESSION["user_id"])) {
        $modelUsers = new Users();
        $modelUsers->updateUserPhoto($_POST["avatar"], $_SESSION["user_id"]);
        echo '{"message" : "OK"}';
    }
}

if ( $_POST["request"] === "deleteGame" ){
    $modelGames = new Games();
    // $modelGames->deleteGame($_POST["game_id"]); ==> Uncomment this line to test 
    echo '{"message" : "OK"}';
}

if ( $_POST["request"] === "deletePlatform" ){
    $modelPlatforms = new Platforms();
    // $modelPlatforms->deletePlatform($_POST["platform_id"]); ==> Uncomment this line to test
    echo '{"message" : "OK"}';
}

if ( $_POST["request"] === "deleteGenre" ){
    $modelGenres = new Genres();
    // $modelGenres->deleteGenre($_POST["genre_id"]); ==> Uncomment this line to test
    echo '{"message" : "OK"}';
}
