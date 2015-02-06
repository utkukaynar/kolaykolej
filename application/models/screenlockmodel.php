<?php

class ScreenLockModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getUser($username, $password)
    {
        $sql = "SELECT * FROM user
				WHERE username = :username
				AND password = :password
				AND status = 1";
        $query = $this->db->prepare($sql);
        $query->execute(array(':username' => $username, ':password' => $password));
		
        return $query->fetch();
    }
}
