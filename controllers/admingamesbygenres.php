<?php

require("Core/basefunctions.php");
require("models/games.php");

$modelGames = new Games();
$games = $modelGames->findGamesAndGenres();


if ( isset($_POST["send"]) ){
    $modelGenres->insertGenre($_POST["genre_name"]);
    echo "<script>alert('Genre inserted into Database');</script>";
}

require("views/admingamesbygenre.php");