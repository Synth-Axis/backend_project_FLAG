<?php

require("Core/basefunctions.php");
require("models/games.php");

$modelGames = new Games();
$games = $modelGames->findGamesAndPlatforms();

require("models/users.php");
$modelUsers = new Users();

if (isset($_SESSION["user_id"])){
    $currentUser = $modelUsers->findUserById($_SESSION["user_id"]);
    $loggedUser = $modelUsers->findUserById($currentUser["user_id"]);

    if($loggedUser["user_type"] !== "admin"){
        http_response_code(403);
        require("views/errors/403.php");
        exit;
    }
    else{
        $users = $modelUsers->getAllUsers();
    }
}
else{
    http_response_code(403);
    require("views/errors/403.php");
    exit;
}


if ( isset($_POST["send"]) ){
    $modelGenres->insertGenre($_POST["genre_name"]);
    echo "<script>alert('Genre inserted into Database');</script>";
}

require("views/admingamesbyplatforms.php");