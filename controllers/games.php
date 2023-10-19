<?php
    
    require("models/games.php");

    $model = new Games();

    $games = $model->getALLGames();

    if( empty($games)){
        http_response_code(404);
        die("Not found");
    }
?>