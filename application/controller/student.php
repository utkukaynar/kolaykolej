<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Student extends Controller
{
	public $_title = 'Öğrenci';
	public $_desc = 'öğrenci işlemleri';
	public $_crumbs = array('Öğrenci');
	public $_action = NULL;
	
    public function index()
    {
        $student_model = $this->loadModel('StudentModel');
        $students = $student_model->getAllStudents();
		
		require 'application/views/_templates/header.php';
        require 'application/views/student/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addStudent()
    {		
		$student_model = $this->loadModel('StudentModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			$birthday = NULL;
			
			if (isset($_POST["birthday"])) {
				$birthday = explode('/', $_POST["birthday"]);
				$birthday = $birthday[2]. '-' .$birthday[1]. '-' .$birthday[0];
			}
			
            $student_model->addStudent($_POST["student_id"],
							$_POST["first_name"],
							$_POST["last_name"],
							$birthday,
							$_POST["gender_id"],
							$_POST["blood_group_id"],
							$_POST["email"],
							$_POST["address"],
							$_POST["phone"],
							$_POST["classroom_id"]);
							
			$student_model->parentsToStudent($this->db->lastInsertId(), (array) $_POST["parents"]);
			
			$imgUploader = new imgUploader;
			$imgUploader->setDestination(ROOT . 'public/upload/student/');
			$imgUploader->setAllowedExtensions('jpg');
			$imgUploader->setFileName($this->db->lastInsertId() . '.jpg');
			$imgUploader->upload($_FILES['image']);
			
			header('location: ' . URL . 'student/index');
			exit;
        }
		
		$this->_action = URL .'student/addstudent';
		$gender = $student_model->getGender();
		$blood_group = $student_model->getBloodGroup();
		$season = $student_model->getSeasons();
		$classroom = $student_model->getClassrooms();
		$parents = $student_model->getParents();
		
		require 'application/views/_templates/header.php';
        require 'application/views/student/student.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateStudent($id = null)
    {
	    if (empty($id)) exit;
		$student_model = $this->loadModel('StudentModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			$birthday = NULL;
			
			if (isset($_POST["birthday"])) {
				$birthday = explode('/', $_POST["birthday"]);
				$birthday = $birthday[2]. '-' .$birthday[1]. '-' .$birthday[0];
			}
			
            $student_model->updateStudent($id,
							$_POST["student_id"],
							$_POST["first_name"],
							$_POST["last_name"],
							$birthday,
							$_POST["gender_id"],
							$_POST["blood_group_id"],
							$_POST["email"],
							$_POST["address"],
							$_POST["phone"],
							$_POST["classroom_id"]);
							
			$student_model->parentsToStudent($id, (array) $_POST["parents"]);
			
			$imgUploader = new imgUploader;
			$imgUploader->setDestination(ROOT . 'public/upload/student/');
			$imgUploader->setAllowedExtensions('jpg');
			$imgUploader->setFileName($id . '.jpg');
			$imgUploader->upload($_FILES['image']);
			
			header('location: ' . URL . 'student/index');
			exit;
        }
		
		$this->_action = URL .'student/updatestudent/'. $id;
		$student = $student_model->getStudent($id);
		$gender = $student_model->getGender();
		$blood_group = $student_model->getBloodGroup();
		$season = $student_model->getSeasons();
		$classroom = $student_model->getClassrooms();
		$parents = $student_model->getParents();
		$parents_to_student = arrayFlatten($student_model->getParentsToStudent($id));
		
		$file = 'public/upload/student/' . $id . '.jpg';
		
		if ( file_exists(ROOT . $file) )
			$image = URL . $file;
		
		require 'application/views/_templates/header.php';
        require 'application/views/student/student.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteStudent($id)
    {
        if (isset($id)) {
            $student_model = $this->loadModel('StudentModel');
            $student_model->deleteStudent($id);
        }
		
        header('location: ' . URL . 'student/index');
    }
	
    public function deleteImage($id)
    {
        if (isset($id)) {
			$file = ROOT . 'public/upload/student/' . $id . '.jpg';
			
			$imgUploader = new imgUploader;
			$imgUploader->delete($file);
			
			header('location: ' . URL . 'student/updatestudent/' . $id);
			exit;
        }
		
		header('location: ' . URL . 'student/index');
    }
}
