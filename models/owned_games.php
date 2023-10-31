<?php

require_once("base.php");

class OwnedGames extends Base{
    
    public function updateUsersGames($userId, $gameId){
        $query = $this->db->prepare("
            INSERT INTO owned_games
                (user_id , game_id)
            VALUES(?, ?)
		");
        $query->execute( 
            [
                $userId,
                $gameId
            ]
        );
    }

    public function getGamesCount($userId){
        $query = $this->db->prepare("
			SELECT 
                COUNT(game_id) AS gamesOwned
			FROM 
				owned_games
            WHERE
                user_id = ?
		");
        $query->execute( [$userId] );
		
		return $query->fetch();
    }

    public function getGamesByOwner($userId){
		$query = $this->db->prepare("
			SELECT
			g.game_id, g.game_name, g.released_on, g.game_photo
		FROM
			games AS g
		INNER JOIN
			owned_games AS og ON(og.game_id = g.game_id)
		WHERE
			og.user_id = ?
			
	");

	$query->execute([ $userId ]);

	return $query->fetchAll();

	}

    public function removeGameFromOwned($userId, $gameId){
		$query = $this->db->prepare("
            DELETE FROM
                owned_games
            WHERE
                user_id = ? && game_id = ?

		");
        $query->execute( 
            [
                $userId,
                $gameId
            ]
        );
    }
}
