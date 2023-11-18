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
}
