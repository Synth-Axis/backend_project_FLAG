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
}