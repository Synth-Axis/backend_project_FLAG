<?php

require("Core/corepageconfig.php");
require("models/ratings.php");

$modelRatings = new Ratings();

$games = $modelGames->getPreviousTopRated();

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

require("views/previoustopgames.php");