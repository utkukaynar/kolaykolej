<?php

class AjaxModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getClassroom($season_id)
    {
        $sql = "SELECT id, name, description FROM classroom
				WHERE season_id = :season_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':season_id' => $season_id));
		
        return $query->fetchAll();
    }
}
