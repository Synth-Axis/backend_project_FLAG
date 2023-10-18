<?php

session_start();

define("ROOT", "/backend");   

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

$controller = $url_parts[2];

if (empty($controller)){
    $controller = "index";
}

if (!empty($url_parts[3])){
    $id = $url_parts[3];
}

require ("controllers/" .$controller. ".php");




