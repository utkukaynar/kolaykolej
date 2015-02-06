<?php

class SearchModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getResults($key)
    {
        $sql = "SELECT id, first_name, last_name, email, phone FROM parents
				WHERE CONCAT(first_name, ' ', last_name) LIKE :key";
        $query = $this->db->prepare($sql);
        $query->execute(array(':key' => '%'. $key .'%'));
		
        return $query->fetchAll();
    }
	
    public function getParent($id)
    {
        $sql = "SELECT *, DATE_FORMAT(birthday,'%d/%m/%Y') AS birthday FROM parents
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function getGender()
    {
        $sql = "SELECT id, name FROM gender";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getStudents($id)
    {				
        $sql = "SELECT s.id, 
				s.first_name, 
				s.last_name
				FROM student AS s
				INNER JOIN parents_to_student AS ps ON ps.student_id = s.id
				WHERE ps.parent_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetchAll();
    }
	
    public function getMeetings($id)
    {		
        $sql = "SELECT id, 
				subject, 
				DATE_FORMAT(date,'%d/%m/%Y') AS date
				FROM meeting
				WHERE parent_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetchAll();
    }
}
