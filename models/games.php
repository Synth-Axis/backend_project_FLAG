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
}