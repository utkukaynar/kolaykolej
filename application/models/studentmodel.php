<?php

class StudentModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllStudents()
    {
        $sql = "SELECT student.id, 
				student.first_name, 
				student.last_name, 
				student.email, 
				student.phone,
				classroom.name AS classroom
				FROM student
				LEFT JOIN classroom ON classroom.id = student.classroom_id";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addStudent($student_id, $first_name, $last_name, $birthday, $gender_id, $blood_group_id , $email, $address, $phone, $classroom_id)
    {
        $sql = "INSERT INTO student (student_id, 
						first_name, 
						last_name,
						birthday,
						gender_id,
						blood_group_id,
						email,
						address,
						phone,
						classroom_id) 
				VALUES (:student_id, 
				:first_name, 
				:last_name,
				:birthday,
				:gender_id,
				:blood_group_id,
				:email,
				:address,
				:phone,
				:classroom_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':student_id' => $student_id, 
			':first_name' => $first_name, 
			':last_name' => $last_name,
			':birthday' => $birthday,
			':gender_id' => $gender_id,
			':blood_group_id' => $blood_group_id,
			':email' => $email,
			':address' => $address,
			':phone' => $phone,
			':classroom_id' => $classroom_id
		));
    }
	
    public function getStudent($id)
    {
		$sql = "SELECT student.*, 
		DATE_FORMAT(student.birthday,'%d/%m/%Y') AS birthday,
		classroom.season_id,
		classroom.name AS classroom
		FROM student
		LEFT JOIN classroom ON classroom.id = student.classroom_id
		WHERE student.id = :id";
		
		/*
        $sql = "SELECT *, DATE_FORMAT(birthday,'%d/%m/%Y') AS birthday FROM student
				WHERE id = :id";
		*/
		
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
	
    public function getBloodGroup()
    {
        $sql = "SELECT id, name FROM blood_group";
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
	
    public function getClassrooms()
    {
        $sql = "SELECT id, name FROM classroom";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getParents()
    {
        $sql = "SELECT id, first_name, last_name FROM parents";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function updateStudent($id, $student_id, $first_name, $last_name, $birthday, $gender_id, $blood_group_id , $email, $address, $phone, $classroom_id)
    {
        $sql = "UPDATE student 
				SET student_id = :student_id,
				first_name = :first_name,
				last_name = :last_name,
				birthday = :birthday,
				gender_id = :gender_id,
				blood_group_id = :blood_group_id,
				email = :email,
				address = :address,
				phone = :phone,
				classroom_id = :classroom_id
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':student_id' => $student_id, 
			':first_name' => $first_name, 
			':last_name' => $last_name,
			':birthday' => $birthday,
			':gender_id' => $gender_id,
			':blood_group_id' => $blood_group_id,
			':email' => $email,
			':address' => $address,
			':phone' => $phone,
			':classroom_id' => $classroom_id,
			':id' => $id
		));
    }
	
    public function deleteStudent($id)
    {
        $sql = "DELETE FROM student WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
	
    public function parentsToStudent($id, $parents = array())
    {
        $sql = "DELETE FROM parents_to_student WHERE student_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
		foreach ($parents as $key => $value) {
			$sql = "INSERT INTO parents_to_student (parent_id, student_id)
					VALUES (:parent_id, :student_id)";
			$query = $this->db->prepare($sql);
			$query->execute(array(':parent_id' => $value, ':student_id' => $id));
		}
    }
	
    public function getParentsToStudent($id)
    {
        $sql = "SELECT parent_id FROM parents_to_student
				WHERE student_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetchAll(PDO::FETCH_NUM);
    }
}
