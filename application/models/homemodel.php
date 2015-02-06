<?php

class HomeModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getStudentCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM student";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getTeacherCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM teacher";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getParentCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM parents";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getClassroomCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM classroom";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getSubjectCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM subject";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getExamCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM exam";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getMeetingCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM meeting";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getNoticeCount()
    {		
        $sql = "SELECT COUNT(id) AS total FROM notice";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetch();
    }
	
    public function getAllNotices()
    {
        $sql = "SELECT id,
				name,
				description,
				content
				FROM notice
				LIMIT 5";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getAllMeetings()
    {		
        $sql = "SELECT m.id, 
				m.subject, 
				p.first_name,
				p.last_name
				FROM meeting AS m
				INNER JOIN parents AS p ON p.id = m.parent_id
				LIMIT 5";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
}
