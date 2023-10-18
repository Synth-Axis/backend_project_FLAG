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
			g.game_id, g.game_name, gp.platform_id, p.px\latform_name
		FROM 
			games AS g
		INNER JOIN
			games_platforms ON g.game_id = games_platforms.game_id AS gp 
		INNER JOIN 
			platforms ON gp.platform_id = platforms.platform_id AS p
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