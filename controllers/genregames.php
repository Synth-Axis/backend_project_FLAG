<?php

require("Core\corepageconfig.php");
require("Core\basefunctions.php");

$message = "";

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

foreach ( $genres as $key => $genre ) {
    $genres[$key]["games"] = $modelGames->findGamesByGenre($genre[("genre_id")]);
}

require ("views/genregames.php");
