<?php

require("models/games.php");
require("models/platforms.php");
require("models/genres.php");

$modelGames = new Games();
$games = $modelGames->getAllGames();

if ( isset($_POST["send"]) ){
    $modelGames->addGame($_POST["game_name"], $_POST["released_on"], $_POST["game_photo"]);
    echo "<script>alert('Game inserted into Database');</script>";
}

if( isset($_POST["deleteGame"]) ){
    $modelPlatforms = new Platforms();
    $gamePlatforms = $modelPlatforms->findPlatformsByGame($_POST["game_id"]);
    $modelGenres = new Genres();
    $gameGenres = $modelGenres->findGenresByGame($_POST["game_id"]);

    if (!empty($gamePlatforms)){
        echo '<script>alert("Cannot delete: Game has platforms dependencies");</script>';
    }
    if (!empty($gameGenres)){
        echo '<script>alert("Cannot delete: Game has genre dependencies");</script>';
    }
};

require("views/admingames.php");