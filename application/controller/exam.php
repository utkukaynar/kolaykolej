<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Exam extends Controller
{
	public $_title = 'Sınavlar';
	public $_desc = 'sınavları yönet';
	public $_crumbs = array('Sınavlar');
	public $_action = NULL;
	
    public function index()
    {
        $exam_model = $this->loadModel('ExamModel');
        $exams = $exam_model->getAllExams();
		
		require 'application/views/_templates/header.php';
        require 'application/views/exam/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addExam()
    {		
		$exam_model = $this->loadModel('ExamModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
			$exam_date = NULL;
			
			if (isset($_POST["exam_date"])) {
				$exam_date = explode('/', $_POST["exam_date"]);
				$exam_date = $exam_date[2]. '-' .$exam_date[1]. '-' .$exam_date[0];
			}
			
            $exam_model->addExam($_POST["name"],
							$_POST["description"],
							$exam_date);
			
			header('location: ' . URL . 'exam/index');
			exit;
        }
		
		$this->_action = URL .'exam/addexam';
		
		require 'application/views/_templates/header.php';
        require 'application/views/exam/exam.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateExam($id = null)
    {
	    if (empty($id)) exit;
		$exam_model = $this->loadModel('ExamModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
			$exam_date = NULL;
			
			if (isset($_POST["exam_date"])) {
				$exam_date = explode('/', $_POST["exam_date"]);
				$exam_date = $exam_date[2]. '-' .$exam_date[1]. '-' .$exam_date[0];
			}
			
            $exam_model->updateExam($id,
							$_POST["name"],
							$_POST["description"],
							$exam_date);
			
			header('location: ' . URL . 'exam/index');
			exit;
        }
		
		$this->_action = URL .'exam/updateexam/'. $id;
		$exam = $exam_model->getExam($id);
		
		require 'application/views/_templates/header.php';
        require 'application/views/exam/exam.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteExam($id)
    {
        if (isset($id)) {
            $exam_model = $this->loadModel('ExamModel');
            $exam_model->deleteExam($id);
        }
		
        header('location: ' . URL . 'exam/index');
    }
	
    public function result()
    {
		$this->_title = 'Sonuçlar';
		$this->_desc = 'sınav sonuçları';
		$this->_crumbs = array('Sınavlar','Sonuçlar');
		$this->_action = URL .'exam/result/';
		
		$exam_model = $this->loadModel('ExamModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
			
			if (isset($_POST["update"])) {
				$exam = $exam_model->getExamResult($_POST["exam_id"],
											$_POST["classroom_id"],
											$_POST["subject_id"],
											$_POST["student_id"]);
				
				if (empty($exam)) {
					$exam_model->addExamResult($_POST["exam_id"],
											$_POST["classroom_id"],
											$_POST["subject_id"],
											$_POST["student_id"],
											$_POST["result"],
											$_POST["comment"]);
				} else {
					$exam_model->updateExamResult($_POST["exam_id"],
											$_POST["classroom_id"],
											$_POST["subject_id"],
											$_POST["student_id"],
											$_POST["result"],
											$_POST["comment"]);
				}
				
				$message = $_POST["student_id"] .' nolu öğrenci güncellendi.';
			}
			
			$results = $exam_model->getExamResults($_POST["exam_id"],
											$_POST["classroom_id"],
											$_POST["subject_id"]);
			
			$exam_id = $_POST["exam_id"];
			$classroom_id = $_POST["classroom_id"];
			$subject_id = $_POST["subject_id"];
        }
		
        $exams = $exam_model->getExams();
		$classrooms = $exam_model->getClassrooms();
		$subjects = $exam_model->getSubjects();
		
		require 'application/views/_templates/header.php';
        require 'application/views/exam/result.php';
        require 'application/views/_templates/footer.php';
    }
}
