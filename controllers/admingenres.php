<?php

require("models/genres.php");

$modelGenres = new Genres();
$genres = $modelGenres->getAll();

if ( isset($_POST["send"]) ){
    $modelGenres->insertGenre($_POST["genre_name"]);
    echo "<script>alert('Genre inserted into Database');</script>";
}

require("views/admingenres.php");