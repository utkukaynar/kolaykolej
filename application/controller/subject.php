<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Subject extends Controller
{
	public $_title = 'Dersler';
	public $_desc = 'dersleri yönet';
	public $_crumbs = array('Dersler');
	public $_action = NULL;
	
    public function index()
    {
        $subject_model = $this->loadModel('SubjectModel');
        $subjects = $subject_model->getAllSubjects();
		
		require 'application/views/_templates/header.php';
        require 'application/views/subject/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addSubject()
    {		
		$subject_model = $this->loadModel('SubjectModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
            $subject_model->addSubject($_POST["name"], $_POST["description"]);
			$subject_model->subjectToTeacher($this->db->lastInsertId(), (array) $_POST["teachers"]);
			
			header('location: ' . URL . 'subject/index');
			exit;
        }
		
		$this->_action = URL .'subject/addsubject';
		$teachers = $subject_model->getTeachers();
		
		require 'application/views/_templates/header.php';
        require 'application/views/subject/subject.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateSubject($id = null)
    {
	    if (empty($id)) exit;
		$subject_model = $this->loadModel('SubjectModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
            $subject_model->updateSubject($id, $_POST["name"], $_POST["description"]);
			$subject_model->subjectToTeacher($id, (array) $_POST["teachers"]);
			
			header('location: ' . URL . 'subject/index');
			exit;
        }
		
		$this->_action = URL .'subject/updatesubject/'. $id;
		$subject = $subject_model->getSubject($id);
		$teachers = $subject_model->getTeachers();
		$subject_to_teacher = arrayFlatten($subject_model->getSubjectToTeacher($id));
		
		require 'application/views/_templates/header.php';
        require 'application/views/subject/subject.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteSubject($id)
    {
        if (isset($id)) {
            $subject_model = $this->loadModel('SubjectModel');
            $subject_model->deleteSubject($id);
        }
		
        header('location: ' . URL . 'subject/index');
    }
}
