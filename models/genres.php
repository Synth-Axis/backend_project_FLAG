<?php

require_once("base.php");

class Genres extends Base{

	public function getAll() {
		
		$query = $this->db->prepare("
			SELECT 
				genre_id, genre_name
			FROM 
				genres
		");
		
		$query->execute();
		
		return $query->fetchAll();
	}

	public function deleteGenre($genreId){
		$query = $this->db->prepare("
			DELETE FROM genres  
			WHERE genre_id = ?
        ");

        $query->execute([
			$genreId
		]);
		
		return $query->fetchAll();
	}

	public function insertGenre($genreName){
		$query = $this->db->prepare("
			INSERT INTO genres  
			(genre_name)
			VALUES(?)
        ");

        $query->execute([
			$genreName
		]);
		
		return $query->fetchAll();
	}

	public function findGenresByGame($gameId){
		$query = $this->db->prepare("
			SELECT 
				g.game_id, g.game_name, gr.genre_id, gen.genre_name
			FROM 
				games AS g
			INNER JOIN
				genres_games AS gr ON(gr.game_id = g.game_id)
			INNER JOIN
				genres AS gen ON(gen.genre_id = gr.genre_id)
			WHERE 
				gr.game_id = ?
		");

		$query->execute( [$gameId] );
		
		return $query->fetchAll();
	}

}
