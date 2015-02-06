<?php

class TeacherModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllTeachers()
    {
        $sql = "SELECT teacher.id, 
				teacher.first_name, 
				teacher.last_name, 
				teacher.email, 
				teacher.phone,
				classroom.name AS classroom
				FROM teacher
				INNER JOIN classroom ON classroom.id = teacher.classroom_id";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addTeacher($first_name, $last_name, $birthday, $gender_id, $blood_group_id , $email, $address, $phone, $classroom_id)
    {
        $sql = "INSERT INTO teacher (first_name, 
						last_name,
						birthday,
						gender_id,
						blood_group_id,
						email,
						address,
						phone,
						classroom_id) 
				VALUES (:first_name, 
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
	
    public function getTeacher($id)
    {
        $sql = "SELECT *, DATE_FORMAT(birthday,'%d/%m/%Y') AS birthday FROM teacher
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
	
    public function getBloodGroup()
    {
        $sql = "SELECT id, name FROM blood_group";
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
	
    public function updateTeacher($id, $first_name, $last_name, $birthday, $gender_id, $blood_group_id , $email, $address, $phone, $classroom_id)
    {
        $sql = "UPDATE teacher 
				SET first_name = :first_name,
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
	
    public function deleteTeacher($id)
    {
        $sql = "DELETE FROM teacher WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
	
    public function teacherToClassroom($id, $classrooms = array())
    {
        $sql = "DELETE FROM teacher_to_classroom WHERE teacher_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
		foreach ($classrooms as $key => $value) {
			$sql = "INSERT INTO teacher_to_classroom (teacher_id, classroom_id)
					VALUES (:teacher_id, :classroom_id)";
			$query = $this->db->prepare($sql);
			$query->execute(array(':teacher_id' => $id, ':classroom_id' => $value));
		}
    }
	
    public function getTeacherToClassroom($id)
    {
        $sql = "SELECT classroom_id FROM teacher_to_classroom
				WHERE teacher_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetchAll(PDO::FETCH_NUM);
    }
}
