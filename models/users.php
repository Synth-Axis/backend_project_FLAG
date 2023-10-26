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

    public function ValidateEmail($email) {

        $query = $this->db->prepare("
            SELECT email
                FROM users
            WHERE email = ?
        
        ");
        
        $query->execute([ $email ]);
        return $query->fetch();
    }
}