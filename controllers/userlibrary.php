<?php

require ("Core/corepageconfig.php");

if (isset($_SESSION["user_id"])){
    $gamesOwned = $modelOwnedGames->getGamesByOwner($_SESSION["user_id"]);
}

require("views/userlibrary.php");