<?php

require_once("base.php");

$games_data = file_get_contents('https://api.rawg.io/api/games?key=cb63f2ea48e84d8ea7f734905915dcd1');
$games = json_decode($games_data, true);

$genres_data = file_get_contents('https://api.rawg.io/api/genres?key=cb63f2ea48e84d8ea7f734905915dcd1');
$genres = json_decode($genres_data, true);

$platforms_data = file_get_contents('https://api.rawg.io/api/platforms?key=cb63f2ea48e84d8ea7f734905915dcd1');
$platforms = json_decode($platforms_data, true);

class Api extends Base{

    //Por cada jogo preenche a tabela games
    public function getGames($games){
        
        foreach( $games["results"] as $game) {

            $query = $this->db->prepare("
                INSERT INTO games
                        (game_id, game_name, released_on, game_photo)
                VALUES
                    (?, ?, ?, ?)
            ");
    
            $query->execute ([
                $game["id"],
                $game["name"],
                $game["released"],
                $game["background_image"]
            ]);
        }
    }

    //Por cada jogo E por cada screenshot preenche a table screenshots
    public function getScreenshots($games){
        
        foreach( $games["results"] as $game) {

            $query = $this->db->prepare("
                INSERT INTO screenshots
                        (game_id, screenshot_image)
                VALUES
                    (?, ?)
            ");
    
            foreach( $game["short_screenshots"] as $screenshot){
    
                $query->execute ([
                    $game["id"],
                    $screenshot["image"]
                ]);
            }
        }
    }


    //por cada genero preenche a tabela genres
    public function getGenres($genres){
        
        foreach( $genres["results"] as $genre) {

            $query = $this->db->prepare("
                INSERT INTO genres
                        (genre_id, genre_name)
                VALUES
                    (?, ?)
            ");
    
            $query->execute ([
                $genre["id"],
                $genre["name"]
            ]);
        }
    }

    //Por cada jogo E por cada rating preenche a table rated_games
    public function getRatings($games){

        foreach( $games["results"] as $game) {

            $query = $this->db->prepare("
                INSERT INTO rated_games
                        (game_id, rating_id)
                VALUES
                    (?, ?)
            ");

            foreach( $game["ratings"] as $rating){
    
                $query->execute ([
                    $game["id"],
                    $rating["id"]
                ]);
            }
        }
    }

    //Por cada plataforma preenche a table platforms
    public function getPlatforms($platforms){

        foreach( $platforms["results"] as $platform) {

            $query = $this->db->prepare("
                INSERT INTO platforms
                        (platform_id, platform_name)
                VALUES
                    (?, ?)
            ");

            $query->execute ([
                $platform["id"],
                $platform["name"]
            ]);
            
        }
    }

    //Por cada jogo E plataforma preenche a table games_platforms
    public function getGamesByPlatforms($platforms){

        foreach( $platforms["results"] as $platform) {

            $query = $this->db->prepare("
                INSERT INTO games_platforms
                        (platform_id, game_id)
                VALUES
                    (?, ?)
            ");

            foreach( $platform["games"] as $plat_game){
    
                $query->execute ([
                    $platform["id"],
                    $plat_game["id"]
                ]);
            }
        }
    }
}

?>

