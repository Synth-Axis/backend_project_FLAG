<?php

require("Core/corepageconfig.php");
require("Core/basefunctions.php");

$message = "";

require("models/ratings.php");
$modelRatings = new Ratings();

$games = $modelGames->getTopRated();

foreach ( $games as $key => $game ) {
    $games[$key]["platforms"] = $modelPlatforms->findPlatformsByGame($game["game_id"]);
}

require("views/topgames.php");
