<?php

class ClassroomModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllClassrooms($season_id)
    {
        $sql = "SELECT id, name, description FROM classroom
				WHERE season_id = :season_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':season_id' => $season_id));
		
        return $query->fetchAll();
    }
	
    public function addClassroom($season_id, $name, $description)
    {
        $sql = "INSERT INTO classroom (season_id, name, description)
				VALUES (:season_id, :name, :description)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':season_id' => $season_id,
			':name' => $name,
			':description' => $description)
		);
    }
	
    public function getClassroom($id)
    {
        $sql = "SELECT * FROM classroom
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function getSeasons()
    {
        $sql = "SELECT id, name FROM season";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function updateClassroom($id, $season_id, $name, $description)
    {
        $sql = "UPDATE classroom 
				SET season_id = :season_id,
				name = :name,
				description = :description
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':season_id' => $season_id,
			':name' => $name, 
			':description' => $description,
			':id' => $id
		));
    }
	
    public function deleteClassroom($id)
    {
        $sql = "DELETE FROM classroom WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
