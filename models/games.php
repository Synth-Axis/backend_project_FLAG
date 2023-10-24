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

}