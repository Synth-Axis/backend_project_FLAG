<?php

require("models/games.php");
require("models/platforms.php");

$modelGames = new Games();
$games = $modelGames->getAllGames();

$modelPlatforms = new Platforms();
$platforms = $modelPlatforms->getPlatforms();

require("views/admingames.php");