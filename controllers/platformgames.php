<?php

require("Core/corepageconfig.php");
require("Core/basefunctions.php");

$message = "";

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

foreach ( $platforms as $key => $platform ) {
    $platforms[$key]["games"] = $modelGames->findGamesByPlatform($id);
}

require ("views/platformgames.php");

