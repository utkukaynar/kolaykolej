<?php

class ExamModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllExams()
    {
        $sql = "SELECT id, name, description, DATE_FORMAT(exam_date,'%d/%m/%Y') AS exam_date FROM exam";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addExam($name, $description, $exam_date)
    {
        $sql = "INSERT INTO exam (name,
						description,
						exam_date)
				VALUES (:name,
				:description,
				:exam_date)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name,
			':description' => $description,
			':exam_date' => $exam_date)
		);
    }
	
    public function getExam($id)
    {
        $sql = "SELECT *, DATE_FORMAT(exam_date,'%d/%m/%Y') AS exam_date FROM exam
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function updateExam($id, $name, $description, $exam_date)
    {
        $sql = "UPDATE exam 
				SET name = :name,
				description = :description,
				exam_date = :exam_date
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name, 
			':description' => $description,
			':exam_date' => $exam_date,
			':id' => $id
		));
    }
	
    public function deleteExam($id)
    {
        $sql = "DELETE FROM exam WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
	
    public function getExams()
    {
        $sql = "SELECT id, name FROM exam";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getClassrooms()
    {
        $sql = "SELECT id, name FROM classroom";
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
	
    public function getExamResults($exam_id, $classroom_id, $subject_id)
    {
        $sql = "SELECT s.id AS student_id, 
				s.first_name, 
				s.last_name,
				er.result,
				er.comment
				FROM student AS s
				LEFT JOIN (SELECT * FROM exam_result
				WHERE exam_id = :exam_id
				AND subject_id = :subject_id) AS er ON s.id = er.student_id
				WHERE s.classroom_id = :classroom_id
				GROUP BY s.id";
		
        $query = $this->db->prepare($sql);		
        $query->execute(array(
			':exam_id' => $exam_id,
			':classroom_id' => $classroom_id,
			':subject_id' => $subject_id)
		);
		
        return $query->fetchAll();
    }
	
    public function getExamResult($exam_id, $classroom_id, $subject_id, $student_id)
    {
        $sql = "SELECT * FROM exam_result
				WHERE exam_id = :exam_id
				AND classroom_id = :classroom_id
				AND subject_id = :subject_id
				AND student_id = :student_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':exam_id' => $exam_id,
			':classroom_id' => $classroom_id,
			':subject_id' => $subject_id,
			':student_id' => $student_id)
		);
		
        return $query->fetch();
    }
	
    public function addExamResult($exam_id, $classroom_id, $subject_id, $student_id, $result, $comment)
    {
        $sql = "INSERT INTO exam_result (exam_id,
						classroom_id,
						subject_id,
						student_id,
						result,
						comment)
				VALUES (:exam_id,
				:classroom_id,
				:subject_id,
				:student_id,
				:result,
				:comment)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':exam_id' => $exam_id,
			':classroom_id' => $classroom_id,
			':subject_id' => $subject_id,
			':student_id' => $student_id,
			':result' => $result,
			':comment' => $comment)
		);
    }
	
    public function updateExamResult($exam_id, $classroom_id, $subject_id, $student_id, $result, $comment)
    {
        $sql = "UPDATE exam_result 
				SET result = :result,
				comment = :comment
				WHERE exam_id = :exam_id
				AND classroom_id = :classroom_id
				AND subject_id = :subject_id
				AND student_id = :student_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':exam_id' => $exam_id, 
			':classroom_id' => $classroom_id,
			':subject_id' => $subject_id,
			':student_id' => $student_id,
			':result' => $result,
			':comment' => $comment
		));
    }
}
