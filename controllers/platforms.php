<?php

require("models/platforms.php");

$model = new Platforms();

$platforms = $model->getPlatforms();

if( empty($platforms)){
    http_response_code(404);
    die("Not found");
}

// $platformsByGame = $model->FindPlatformsByGame($id);

?>