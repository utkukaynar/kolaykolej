<?php

class ParentModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllParents()
    {
        $sql = "SELECT id, first_name, last_name, email, phone FROM parents";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addParent($first_name, $last_name, $birthday, $gender_id, $email, $address, $phone)
    {
        $sql = "INSERT INTO parents (first_name, 
						last_name,
						birthday,
						gender_id,
						email,
						address,
						phone) 
				VALUES (:first_name, 
				:last_name,
				:birthday,
				:gender_id,
				:email,
				:address,
				:phone)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':first_name' => $first_name, 
			':last_name' => $last_name,
			':birthday' => $birthday,
			':gender_id' => $gender_id,
			':email' => $email,
			':address' => $address,
			':phone' => $phone
		));
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
	
    public function getStudents()
    {
        $sql = "SELECT id, first_name, last_name FROM student";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function updateParent($id, $first_name, $last_name, $birthday, $gender_id , $email, $address, $phone)
    {
        $sql = "UPDATE parents 
				SET first_name = :first_name,
				last_name = :last_name,
				birthday = :birthday,
				gender_id = :gender_id,
				email = :email,
				address = :address,
				phone = :phone
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array( 
			':first_name' => $first_name, 
			':last_name' => $last_name,
			':birthday' => $birthday,
			':gender_id' => $gender_id,
			':email' => $email,
			':address' => $address,
			':phone' => $phone,
			':id' => $id
		));
    }
	
    public function deleteParent($id)
    {
        $sql = "DELETE FROM parents WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
	
    public function parentsToStudent($id, $students = array())
    {
        $sql = "DELETE FROM parents_to_student WHERE parent_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
		foreach ($students as $key => $value) {
			$sql = "INSERT INTO parents_to_student (parent_id, student_id)
					VALUES (:parent_id, :student_id)";
			$query = $this->db->prepare($sql);
			$query->execute(array(':parent_id' => $id, ':student_id' => $value));
		}
    }
	
    public function getParentsToStudent($id)
    {
        $sql = "SELECT student_id FROM parents_to_student
				WHERE parent_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetchAll(PDO::FETCH_NUM);
    }
}
