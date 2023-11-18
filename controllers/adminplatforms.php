<?php

require("models/platforms.php");

$modelPlatforms = new Platforms();
$platforms = $modelPlatforms->getPlatforms();

if ( isset($_POST["send"]) ){
    $modelPlatforms->insertPlatform($_POST["platform_name"]);
    echo "<script>alert('Platform inserted into Database');</script>";
}

require("views/adminplatforms.php");