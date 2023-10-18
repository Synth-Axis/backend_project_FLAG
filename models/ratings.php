<?php

require_once("base.php");

class Ratings extends Base{
    public function getRatings() {
		
		$query = $this->db->prepare("
                SELECT
                    rating_id, rating_title, rating_score
                FROM
                    ratings
            ");

            $query->execute();

            return $query->fetchAll();
    }
}