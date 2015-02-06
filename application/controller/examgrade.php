<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ExamGrade extends Controller
{
	public $_title = 'Not Sistemi';
	public $_desc = 'not sistemini yönet';
	public $_crumbs = array('Not Sistemi');
	public $_action = NULL;
	
    public function index()
    {
        $examgrade_model = $this->loadModel('ExamGradeModel');
        $examgrades = $examgrade_model->getAllExamGrades();
		
		require 'application/views/_templates/header.php';
        require 'application/views/examgrade/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addExamGrade()
    {		
		$examgrade_model = $this->loadModel('ExamGradeModel');
		
		if (isset($_POST["submit"])) {
            $examgrade_model->addExamGrade($_POST["name"],
							$_POST["point"],
							$_POST["from"],
							$_POST["upto"]);
			
			header('location: ' . URL . 'examgrade/index');
			exit;
        }
		
		$this->_action = URL .'examgrade/addexamgrade';
		
		require 'application/views/_templates/header.php';
        require 'application/views/examgrade/examgrade.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateExamGrade($id = null)
    {
	    if (empty($id)) exit;
		$examgrade_model = $this->loadModel('ExamGradeModel');
		
		if (isset($_POST["submit"])) {
            $examgrade_model->updateExamGrade($id,
							$_POST["name"],
							$_POST["point"],
							$_POST["from"],
							$_POST["upto"]);
			
			header('location: ' . URL . 'examgrade/index');
			exit;
        }
		
		$this->_action = URL .'examgrade/updateexamgrade/'. $id;
		$examgrade = $examgrade_model->getExamGrade($id);
		
		require 'application/views/_templates/header.php';
        require 'application/views/examgrade/examgrade.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteExamGrade($id)
    {
        if (isset($id)) {
            $examgrade_model = $this->loadModel('ExamGradeModel');
            $examgrade_model->deleteExamGrade($id);
        }
		
        header('location: ' . URL . 'examgrade/index');
    }
}
