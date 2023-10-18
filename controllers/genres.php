<?php
    
    require("models/genres.php");

    $model = new Genres();

    $genres = $model->getAll();

    if( empty($genres)){
        http_response_code(404);
        die("Not found");
    }
?>