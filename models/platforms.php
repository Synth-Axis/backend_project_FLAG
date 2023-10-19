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

	public function FindPlatformsByGame($id){
		$query = $this->db->prepare("

		SELECT 
			g.game_id, g.game_name, GROUP_CONCAT(p.platform_name) AS Platforms
		FROM 
			games AS g
		INNER JOIN
			games_platforms AS gp ON gp.game_id = $id
		INNER JOIN 
			platforms AS p ON gp.platform_id = p.platform_id
		WHERE
			g.game_id = $id
		");

		$query->execute();
		
		return $query->fetchAll();
	}
}

// SELECT 
// 				gp.platform_id, p.platform_name, g.game_id
// 			FROM 
// 				games_platforms AS gp
// 			INNER JOIN
// 				games AS g USING(platform_id)
// 			INNER JOIN
// 				platforms AS p USING(platform_id)
// 			WHERE
// 				g.game_id = $id