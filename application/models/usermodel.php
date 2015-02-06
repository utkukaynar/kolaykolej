<?php

class UserModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllUsers()
    {		
        $sql = "SELECT user.id, 
				user.user_group_id, 
				user.username, 
				user.first_name,
				user.last_name,
				user.email, 
				user_group.name AS user_group
				FROM user
				INNER JOIN user_group ON user_group.id = user.user_group_id";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addUser($user_group_id, $username, $password, $first_name, $last_name, $email, $status)
    {
        $sql = "INSERT INTO user (user_group_id, 
						username,
						password,
						first_name,
						last_name,
						email,
						status) 
				VALUES (:user_group_id, 
				:username,
				:password,
				:first_name,
				:last_name,
				:email,
				:status)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':user_group_id' => $user_group_id, 
			':username' => $username,
			':password' => $password,
			':first_name' => $first_name, 
			':last_name' => $last_name,
			':email' => $email,
			':status' => $status,
		));
    }
	
    public function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function getUserGroups()
    {
        $sql = "SELECT id, name FROM user_group";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function updateUser($id, $user_group_id, $username, $password, $first_name, $last_name, $email, $status)
    {
        $sql = "UPDATE user 
				SET user_group_id = :user_group_id,
				username = :username,
				password = :password,
				first_name = :first_name,
				last_name = :last_name,
				email = :email,
				status = :status
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':user_group_id' => $user_group_id, 
			':username' => $username,
			':password' => $password,
			':first_name' => $first_name, 
			':last_name' => $last_name,
			':email' => $email,
			':status' => $status,
			':id' => $id
		));
    }
	
    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
