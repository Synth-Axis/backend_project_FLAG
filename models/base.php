<?php

class Base{

    public $db;

    public function __construct() {
    
        $this->db = new PDO(
            "mysql:host=" .ENV["DB_HOST"]. ";dbname=" .ENV["DB_NAME"]. ";charset=utf8mb4", 
            ENV["DB_USER"], 
            ENV["DB_PASSWORD"],
            // "mysql:host=localhost;dbname=game_hub;charset=utf8mb4", "root", "",
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]
        );
    }
}