<?php

require("Core/corepageconfig.php");
require("Core/basefunctions.php");

$message = "";

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    require("views/errors/400.php");
    exit;
}

$platformsIds = $modelPlatforms->getPlatforms();

foreach ( $platforms as $key => $platform ) {
    $platforms[$id]["games"] = $modelGames->findGamesByPlatform($id);
}

require ("views/platformgames.php");

