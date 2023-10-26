<?php

require_once("base.php");

class Users extends Base{
    public function getAllUsers() {
		
		$query = $this->db->prepare("
			SELECT 
                user_id , username, email , password, user_type
			FROM 
				users
		");
		
		$query->execute();
		
		return $query->fetchAll();
	}

    public function findUserByEmail($email) {
		
		$query = $this->db->prepare("
			SELECT 
                user_id , username, email , password, user_type
			FROM 
				users
            WHERE
                email = ?
		");
		
		$query->execute( [$email] );
		
		return $query->fetch();
	}

    public function RegisterUser($formData) {

        $query = $this->db->prepare("
            INSERT INTO users
                (username, email, password)
                VALUES(?, ?, ?)
            ");

        $query->execute (
            [
                $formData["username"], 
                $formData["email"], 
                password_hash($formData["password"], PASSWORD_DEFAULT)
            ]
        );
    }

    public function findUserById($id) {
		
		$query = $this->db->prepare("
			SELECT 
                user_id , username, email , password, user_type
			FROM 
				users
            WHERE
                user_id = ?
		");
        $query->execute( [$id] );
		
		return $query->fetch();
    }
}