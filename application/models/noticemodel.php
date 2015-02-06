<?php

class NoticeModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllNotices()
    {
        $sql = "SELECT id, name, description, content FROM notice";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addNotice($name, $description, $content)
    {
        $sql = "INSERT INTO notice (name,
						description,
						content)
				VALUES (:name,
				:description,
				:content)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name,
			':description' => $description,
			':content' => $content)
		);
    }
	
    public function getNotice($id)
    {
        $sql = "SELECT * FROM notice
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function updateNotice($id, $name, $description, $content)
    {
        $sql = "UPDATE notice 
				SET name = :name,
				description = :description,
				content = :content
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name, 
			':description' => $description,
			':content' => $content,
			':id' => $id
		));
    }
	
    public function deleteNotice($id)
    {
        $sql = "DELETE FROM notice WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
