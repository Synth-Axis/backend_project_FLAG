<?php

require_once("base.php");

class Users extends Base{

	public function getUserByEmail() {
		
		$query = $this->db->prepare("
                SELECT
                    user_id, username, email, password, country
                FROM
                    users
            ");

            $query->execute();

            return $query->fetchAll();
    }
}