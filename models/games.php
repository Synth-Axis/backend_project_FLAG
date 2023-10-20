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
}