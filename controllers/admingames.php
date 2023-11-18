<?php

require("models/games.php");

$modelGames = new Games();
$games = $modelGames->getAllGames();

if ( isset($_POST["send"]) ){
    $modelGames->addGame($_POST["game_name"], $_POST["released_on"], $_POST["game_photo"]);
    echo "<script>alert('Game inserted into Database');</script>";
}

require("views/admingames.php");