<?php

require_once("base.php");

class Ratings extends Base{

    public function getAverageRatings($gameId){

        $query = $this->db->prepare("
        SELECT 
            g.game_id, AVG(r.rating_score) as average_rating
        FROM
            games g
        INNER JOIN
            rated_games AS rg ON(rg.game_id = g.game_id)
        INNER JOIN
        	ratings AS r ON(r.rating_id = rg.rating_id)
        WHERE
        	g.game_id = ?
        ");

        $query->execute($gameId);
		
		return $query->fetch();
    }

    public function findRatingsByGame($gameId){
		$query = $this->db->prepare("
			SELECT 
				g.game_id, g.game_name, rg.rating_id, r.rating_score AS score
			FROM 
				games AS g
			INNER JOIN
                rated_games AS rg ON(rg.game_id = g.game_id)
			INNER JOIN
				ratings AS r ON(r.rating_id = rg.rating_id)
			WHERE 
				rg.game_id = ?
		");

		$query->execute( [$gameId] );
		
		return $query->fetchAll();
	}
}