<?php

class SubjectModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllSubjects()
    {
        // $sql = "SELECT id, name, description FROM subject";
		
        $sql = "SELECT s.id, 
				s.name, 
				s.description, 
				GROUP_CONCAT(t.first_name ORDER BY t.first_name) AS teachers
				FROM subject AS s
				LEFT JOIN subject_to_teacher AS st ON s.id = st.subject_id
				LEFT JOIN teacher AS t ON t.id = st.teacher_id
				GROUP BY s.id";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addSubject($name, $description)
    {
        $sql = "INSERT INTO subject (name, description)
				VALUES (:name, :description)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':description' => $description));
    }
	
    public function getSubject($id)
    {
        $sql = "SELECT * FROM subject
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function getTeachers()
    {
        $sql = "SELECT id, first_name, last_name FROM teacher";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function updateSubject($id, $name, $description)
    {
        $sql = "UPDATE subject 
				SET name = :name,
				description = :description
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name, 
			':description' => $description,
			':id' => $id
		));
    }
	
    public function deleteSubject($id)
    {
        $sql = "DELETE FROM subject WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
	
    public function subjectToTeacher($id, $teachers = array())
    {
        $sql = "DELETE FROM subject_to_teacher WHERE subject_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
		foreach ($teachers as $key => $value) {
			$sql = "INSERT INTO subject_to_teacher (subject_id, teacher_id)
					VALUES (:subject_id, :teacher_id)";
			$query = $this->db->prepare($sql);
			$query->execute(array(':subject_id' => $id, ':teacher_id' => $value));
		}
    }
	
    public function getSubjectToTeacher($id)
    {
        $sql = "SELECT teacher_id FROM subject_to_teacher
				WHERE subject_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetchAll(PDO::FETCH_NUM);
    }
}
