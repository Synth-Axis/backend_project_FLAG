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
				gp.game_id = ?
		");

		$query->execute( [$gameId] );
		
		return $query->fetchAll();
	}

	public function deletePlatform($platformId){
		$query = $this->db->prepare("
			DELETE FROM platforms  
			WHERE platform_id = ?
        ");

        $query->execute([
			$platformId
		]);
		
		return $query->fetchAll();
	}

	public function insertPlatform($platformName){
		$query = $this->db->prepare("
			INSERT INTO platforms  
			(platform_name)
			VALUES(?)
        ");

        $query->execute([
			$platformName
		]);
		
		return $query->fetchAll();
	}
}