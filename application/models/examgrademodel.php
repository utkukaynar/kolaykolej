<?php

class ExamGradeModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllExamGrades()
    {
        $sql = "SELECT id, name, point, `from`, upto FROM exam_grade";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addExamGrade($name, $point, $from, $upto)
    {
        $sql = "INSERT INTO exam_grade (name,
						point,
						`from`,
						upto)
				VALUES (:name,
				:point,
				:from,
				:upto)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name,
			':point' => $point,
			':from' => $from,
			':upto' => $upto)
		);
    }
	
    public function getExamGrade($id)
    {
        $sql = "SELECT * FROM exam_grade
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function updateExamGrade($id, $name, $point, $from, $upto)
    {
        $sql = "UPDATE exam_grade 
				SET name = :name,
				point = :point,
				`from` = :from,
				upto = :upto
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':name' => $name, 
			':point' => $point,
			':from' => $from,
			':upto' => $upto,
			':id' => $id
		));
    }
	
    public function deleteExamGrade($id)
    {
        $sql = "DELETE FROM exam_grade WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
