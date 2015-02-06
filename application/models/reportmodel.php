<?php

class ReportModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getStudentList($classroom_id, $gender_id, $blood_group_id)
    {		
		$sql = "SELECT s.student_id,
				s.first_name,
				s.last_name,
				s.email,
				s.address,
				s.phone,
				DATE_FORMAT(s.birthday,'%d/%m/%Y') AS birthday,
				g.name AS gender,
				bg.name AS blood_group,
				c.name AS classroom
				FROM student AS s
				LEFT JOIN gender AS g ON g.id = s.gender_id
				LEFT JOIN blood_group AS bg ON bg.id = s.blood_group_id
				LEFT JOIN classroom AS c ON c.id = s.classroom_id
				WHERE s.classroom_id IN($classroom_id)";
		
		if (!empty($gender_id))
			$sql.= "AND s.gender_id = $gender_id ";
			
		if (!empty($blood_group_id))
			$sql.= "AND s.blood_group_id = $blood_group_id ";
		
		$sql.= "ORDER BY s.student_id";
		
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getClassList($classroom_id)
    {		
        $sql = "SELECT id,
				student_id,
				CONCAT(first_name, ' ', last_name) AS name
				FROM student
				WHERE classroom_id = :classroom_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':classroom_id' => $classroom_id));
		
        return $query->fetchAll();
    }
	
    public function getNumberOfStudent($season_id)
    {		
        $sql = "SELECT c.name,
				COUNT(s.id) AS `count`
				FROM classroom AS c
				LEFT JOIN student AS s ON s.classroom_id = c.id
				WHERE c.season_id = :season_id
				GROUP BY c.id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':season_id' => $season_id));
		
        return $query->fetchAll();
    }
	
    public function getExamResults($classroom_id, $exam_id, $subject_id)
    {
		$sql = "SELECT s.student_id,
				s.first_name,
				s.last_name,
				er.result,
				er.comment,
				c.name AS classroom
				FROM exam_result AS er
				LEFT JOIN student AS s ON s.id = er.student_id
				LEFT JOIN classroom AS c ON c.id = er.classroom_id
				WHERE er.classroom_id IN($classroom_id)
				AND er.exam_id = $exam_id
				AND er.subject_id = $subject_id
				ORDER BY s.student_id";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getTeacherList($classroom_id, $subject_id)
    {		
		$sql = "SELECT t.first_name,
				t.last_name,
				t.email,
				t.address,
				t.phone,
				DATE_FORMAT(t.birthday,'%d/%m/%Y') AS birthday,
				bg.name AS blood_group
				FROM teacher AS t
				LEFT JOIN blood_group AS bg ON bg.id = t.blood_group_id
				LEFT JOIN teacher_to_classroom AS tc ON tc.teacher_id = t.id
				LEFT JOIN subject_to_teacher AS st ON st.teacher_id = t.id
				WHERE tc.classroom_id IN($classroom_id) ";
		
		if (!empty($subject_id))
			$sql.= "AND st.subject_id = $subject_id ";
		
		$sql.= "GROUP BY t.id";
		
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getParentList($classroom_id)
    {		
		$sql = "SELECT p.first_name,
				p.last_name,
				p.email,
				p.address,
				p.phone,
				DATE_FORMAT(p.birthday,'%d/%m/%Y') AS birthday
				FROM parents AS p
				LEFT JOIN parents_to_student AS ps ON ps.parent_id = p.id
				LEFT JOIN student AS s ON s.id = ps.student_id
				WHERE s.classroom_id IN($classroom_id)
				GROUP BY p.id";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getSeasons()
    {
        $sql = "SELECT id, name FROM season";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getClassrooms($season_id)
    {
        $sql = "SELECT id, name FROM classroom
				WHERE season_id = :season_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':season_id' => $season_id));
		
        return $query->fetchAll();
    }
	
    public function getGender()
    {
        $sql = "SELECT id, name FROM gender";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getBloodGroup()
    {
        $sql = "SELECT id, name FROM blood_group";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getExams()
    {
        $sql = "SELECT id, name FROM exam";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getSubjects()
    {
        $sql = "SELECT id, name FROM subject";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
}
