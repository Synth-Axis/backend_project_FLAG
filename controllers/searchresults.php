<?php

require("Core/corepageconfig.php");
require("Core/basefunctions.php");

$message = "";

if (isset($_POST["search"])) {
    $searchString = "%".$_POST["search"]."%";
    $games = $modelGames->searchGames($searchString);   
    }

if (empty($games)){
    $message = "No results found my beloved!";
}

require("views/searchresults.php");