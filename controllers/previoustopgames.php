<?php

require("Core/corepageconfig.php");
require("Core/basefunctions.php");
require("models/ratings.php");

$message = "";

$modelRatings = new Ratings();

$games = $modelGames->getPreviousTopRated();

foreach ( $games as $key => $game ) {
    $games[$key]["platforms"] = $modelPlatforms->findPlatformsByGame($game["game_id"]);
}

require("views/previoustopgames.php");