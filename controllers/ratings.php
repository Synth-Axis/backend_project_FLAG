<?php
    
require("models/ratings.php");

$model = new Ratings();

$ratings = $model->getRatings();

if( empty($ratings)){
    http_response_code(404);
    die("Not found");
}

require("views/ratings.view.php");
