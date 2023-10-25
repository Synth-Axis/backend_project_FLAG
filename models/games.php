<?php

require_once("base.php");

class Games extends Base{

	public function getAllGames() {
		
		$query = $this->db->prepare("
			SELECT 
				game_id, game_name, released_on, game_photo
			FROM 
				games
		");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	public function getLatestGames() {
		
		$query = $this->db->prepare("
			SELECT 
				game_id, game_name, released_on, game_photo
			FROM 
				games
			WHERE DATE(released_on) >= '2018-01-01'
		");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	public function getPreviousGames() {
		
		$query = $this->db->prepare("
			SELECT 
				game_id, game_name, released_on, game_photo
			FROM 
				games
			WHERE DATE(released_on) < '2018-01-01'
		");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	public function getGameDetail($id){

		$query = $this->db->prepare("
			SELECT
				*
			FROM 
				games
			WHERE 
				game_id= ?

		");

		$query->execute([ $id ]);

		return $query->fetch();

	}

	public function findGamesByPlatform($platformId){
		$query = $this->db->prepare("
		SELECT
			g.game_id, g.game_name, g.released_on, g.game_photo, gp.game_id, gp.platform_id
		FROM
			games_platforms AS gp   
		INNER JOIN
			platforms as p ON(p.platform_id = gp.platform_id)
		INNER JOIN
			games as g ON(g.game_id = gp.game_id)
		WHERE
			p.platform_id = ?
		");

		$query->execute( [$platformId] );
		
		return $query->fetchAll();
	}

	public function findGamesByGenre($genre){
		$query = $this->db->prepare("
		SELECT
			g.game_id, g.game_name, g.released_on, g.game_photo, gr.game_id, gr.genre_id
		FROM
			genres_games AS gr   
		INNER JOIN
			genres as gen ON(gen.genre_id = gr.genre_id)
		INNER JOIN
			games as g ON(g.game_id = gr.game_id)
		WHERE
			gen.genre_id = ?
		");

		$query->execute( [$genre] );
		
		return $query->fetchAll();
	}


	public function getTopRated(){

        $query = $this->db->prepare("

		SELECT
			g.game_id, g.game_name, g.game_photo, g.released_on , AVG(r.rating_score) AS averageScore
		FROM 
			games AS g
		INNER JOIN
			rated_games AS rg ON(rg.game_id = g.game_id)
		INNER JOIN
			ratings AS r ON(r.rating_id = rg.rating_id)
        GROUP BY 
			g.game_id, g.game_name, g.game_photo, g.released_on 
		HAVING  
			AVG(r.rating_score) >= 3.5
        ");

        $query->execute();
		
		return $query->fetchAll();
    }

	public function getPreviousTopRated(){

        $query = $this->db->prepare("

		SELECT
			g.game_id, g.game_name, g.game_photo, g.released_on , AVG(r.rating_score) AS averageScore
		FROM 
			games AS g
		INNER JOIN
			rated_games AS rg ON(rg.game_id = g.game_id)
		INNER JOIN
			ratings AS r ON(r.rating_id = rg.rating_id)
        GROUP BY 
			g.game_id, g.game_name, g.game_photo, g.released_on 
		HAVING  
			AVG(r.rating_score) < 3.5
        ");

        $query->execute();
		
		return $query->fetchAll();
    }

}