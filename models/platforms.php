<?php

require_once("base.php");

class Platforms extends Base{

	public function getPlatforms() {
		
		$query = $this->db->prepare("
			SELECT 
				platform_id, platform_name
			FROM 
				platforms
		");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	public function findPlatformsByGame($gameId){
		$query = $this->db->prepare("
			SELECT 
				g.game_id, g.game_name, gp.platform_id, p.platform_name AS platformName
			FROM 
				games AS g
			INNER JOIN
				games_platforms AS gp ON(gp.game_id = g.game_id)
			INNER JOIN
				platforms AS p ON(p.platform_id = gp.platform_id)
			WHERE
				g.game_id = ?
		");

		$query->execute( [$gameId] );
		
		return $query->fetchAll();
	}
}