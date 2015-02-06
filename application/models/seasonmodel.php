<?php

class SeasonModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllSeasons()
    {
        $sql = "SELECT id, name FROM season";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addSeason($name)
    {
        $sql = "INSERT INTO season (name) VALUES (:name)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name));
    }
	
    public function getSeason($id)
    {
        $sql = "SELECT * FROM season WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function updateSeason($id, $name)
    {
        $sql = "UPDATE season SET name = :name WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':id' => $id));
    }
	
    public function deleteSeason($id)
    {
        $sql = "DELETE FROM season WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
