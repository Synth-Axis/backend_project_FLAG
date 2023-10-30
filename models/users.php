<?php

require_once("base.php");

class Users extends Base{
    public function getAllUsers() {
		
		$query = $this->db->prepare("
			SELECT 
                user_id , username, email , password, user_photo, user_type
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
                user_id , username, email , password, user_photo, user_type
			FROM 
				users
            WHERE
                user_id = ?
		");
        $query->execute( [$id] );
		
		return $query->fetch();
    }

    public function updateUserInfo($user, $id) {
		
		$query = $this->db->prepare("
			UPDATE users
			SET 
                username = ?,
                email = ?, 
                password = ?
            WHERE
                user_id = ?
		");
        $query->execute( 
            [
                $user["username"],
                $user["email"],
                password_hash($user["password"], PASSWORD_DEFAULT),
                $id
            ]
        );
    }

    public function updateUsername($username, $id) {
		
		$query = $this->db->prepare("
			UPDATE users
			SET 
                username = ?
            WHERE
                user_id = ?
		");
        $query->execute( 
            [
                $username["username"],
                $id
            ]
        );
    }

    public function updateUserEmail($userEmail, $id) {
		
		$query = $this->db->prepare("
			UPDATE users
			SET 
                email = ?
            WHERE
                user_id = ?
		");
        $query->execute( 
            [
                $userEmail["email"],
                $id
            ]
        );
    }
}