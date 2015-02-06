<?php

class MeetingModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
    public function getAllMeetings()
    {		
        $sql = "SELECT m.id, 
				m.subject, 
				DATE_FORMAT(m.date,'%d/%m/%Y') AS date, 
				p.first_name,
				p.last_name
				FROM meeting AS m
				INNER JOIN parents AS p ON p.id = m.parent_id";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function addMeeting($parent_id, $communication_id, $subject, $content, $date)
    {
        $sql = "INSERT INTO meeting (parent_id,
						communication_id,
						subject,
						content,
						date)
				VALUES (:parent_id,
				:communication_id,
				:subject,
				:content,
				:date)";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':parent_id' => $parent_id,
			':communication_id' => $communication_id,
			':subject' => $subject,
			':content' => $content,
			':date' => $date)
		);
    }
		
    public function getMeeting($id)
    {
        $sql = "SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS date FROM meeting
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
		
        return $query->fetch();
    }
	
    public function getParents()
    {
        $sql = "SELECT id, first_name, last_name FROM parents";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function getCommunications()
    {
        $sql = "SELECT id, name FROM communication";
        $query = $this->db->prepare($sql);
        $query->execute();
		
        return $query->fetchAll();
    }
	
    public function updateMeeting($id, $parent_id, $communication_id, $subject, $content, $date)
    {
        $sql = "UPDATE meeting 
				SET parent_id = :parent_id,
				communication_id = :communication_id,
				subject = :subject,
				content = :content,
				date = :date
				WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(
			':parent_id' => $parent_id, 
			':communication_id' => $communication_id,
			':subject' => $subject,
			':content' => $content,
			':date' => $date,
			':id' => $id
		));
    }
	
    public function deleteMeeting($id)
    {
        $sql = "DELETE FROM meeting WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
