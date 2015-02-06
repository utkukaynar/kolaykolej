<?php

class LoginModel
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
        $sql = "SELECT user.id, 
				user.username, 
				user.first_name,
				user.last_name,
				user.email, 
				user_group.permission AS permission
				FROM user
				INNER JOIN user_group ON user_group.id = user.user_group_id
				WHERE user.username = :username
				AND user.password = :password
				AND user.status = 1";
        $query = $this->db->prepare($sql);
        $query->execute(array(':username' => $username, ':password' => $password));
		
        return $query->fetch();
    }
}
