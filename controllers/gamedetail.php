<?php

require("Core\corepageconfig.php");

if ( empty($id) || !is_numeric($id)){
    http_response_code(400);
    die("Request inválido");
}

$game = $modelGames->getGameDetail($id);
if( empty($game)){
    http_response_code(404);
    die("Não encontrado");
}

require ("views/gamedetail.php");