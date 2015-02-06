<?php

class UserGroupModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllUserGroups()
    {		
        $sql = "SELECT id, name, permission FROM user_group";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addUserGroup($name, $permission)
    {
        $sql = "INSERT INTO user_group (name, permission) 
				VALUES (:name, :permission)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':permission' => $permission));
    }
	
    public function getUserGroup($id)
    {
        $sql = "SELECT * FROM user_group WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function updateUserGroup($id, $name, $permission)
    {
        $sql = "UPDATE user_group 
				SET name = :name,
				permission = :permission
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name, 
			':permission' => $permission,
			':id' => $id
		));
    }
	
    public function deleteUserGroup($id)
    {
        $sql = "DELETE FROM user_group WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
