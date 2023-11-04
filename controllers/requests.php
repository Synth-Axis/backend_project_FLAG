<?php

header("Content-Type: application/json");

require("Core/basefunctions.php");
require("models/owned_games.php");

if ( $_POST["request"] === "removeGameFromOwned" ){
    
    $modelOwnedGames = new OwnedGames();
    $modelOwnedGames->removeGameFromOwned($_SESSION["user_id"], $_POST["game_id"]);
    echo '{"message" : "OK"}';
}

if ( $_POST["request"] === "addGamesToUserList" ){
    if (isset($_SESSION["user_id"])){
        $modelOwnedGames = new OwnedGames();
        $modelOwnedGames->updateUsersGames( $_SESSION["user_id"], $_POST["game_id"]);
        echo '{"message" : "Game added to User Account"}';
    }
    else {
        echo '{"message" : "User must be logged in"}';
        $message = "User must be logged in";
    }
}