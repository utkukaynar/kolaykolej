<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Teacher extends Controller
{
	public $_title = 'Öğretmen';
	public $_desc = 'öğretmenleri yönet';
	public $_crumbs = array('Öğretmen');
	public $_action = NULL;
	
    public function index()
    {
        $teacher_model = $this->loadModel('TeacherModel');
        $teachers = $teacher_model->getAllTeachers();
		
		require 'application/views/_templates/header.php';
        require 'application/views/teacher/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addTeacher()
    {
		$teacher_model = $this->loadModel('TeacherModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			$birthday = NULL;
			
			if (isset($_POST["birthday"])) {
				$birthday = explode('/', $_POST["birthday"]);
				$birthday = $birthday[2]. '-' .$birthday[1]. '-' .$birthday[0];
			}
			
            $teacher_model->addTeacher($_POST["first_name"],
							$_POST["last_name"],
							$birthday,
							$_POST["gender_id"],
							$_POST["blood_group_id"],
							$_POST["email"],
							$_POST["address"],
							$_POST["phone"],
							$_POST["classroom_id"]);
							
			$teacher_model->teacherToClassroom($this->db->lastInsertId(), (array) $_POST["classrooms"]);
			
			$imgUploader = new imgUploader;
			$imgUploader->setDestination(ROOT . 'public/upload/teacher/');
			$imgUploader->setAllowedExtensions('jpg');
			$imgUploader->setFileName($this->db->lastInsertId() . '.jpg');
			$imgUploader->upload($_FILES['image']);
			
			header('location: ' . URL . 'teacher/index');
			exit;
        }
		
		$this->_action = URL .'teacher/addteacher';
		$gender = $teacher_model->getGender();
		$blood_group = $teacher_model->getBloodGroup();
		$classroom = $teacher_model->getClassrooms();
		
		require 'application/views/_templates/header.php';
        require 'application/views/teacher/teacher.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateTeacher($id = null)
    {
	    if (empty($id)) exit;
		$teacher_model = $this->loadModel('TeacherModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			$birthday = NULL;
			
			if (isset($_POST["birthday"])) {
				$birthday = explode('/', $_POST["birthday"]);
				$birthday = $birthday[2]. '-' .$birthday[1]. '-' .$birthday[0];
			}
			
            $teacher_model->updateTeacher($id,
							$_POST["first_name"],
							$_POST["last_name"],
							$birthday,
							$_POST["gender_id"],
							$_POST["blood_group_id"],
							$_POST["email"],
							$_POST["address"],
							$_POST["phone"],
							$_POST["classroom_id"]);
							
			$teacher_model->teacherToClassroom($id, (array) $_POST["classrooms"]);
			
			$imgUploader = new imgUploader;
			$imgUploader->setDestination(ROOT . 'public/upload/teacher/');
			$imgUploader->setAllowedExtensions('jpg');
			$imgUploader->setFileName($id . '.jpg');
			$imgUploader->upload($_FILES['image']);
			
			header('location: ' . URL . 'teacher/index');
			exit;
        }
		
		$this->_action = URL .'teacher/updateteacher/'. $id;
		$teacher = $teacher_model->getTeacher($id);
		$gender = $teacher_model->getGender();
		$blood_group = $teacher_model->getBloodGroup();
		$classroom = $teacher_model->getClassrooms();
		$teacher_to_classroom = arrayFlatten($teacher_model->getTeacherToClassroom($id));
		
		$file = 'public/upload/teacher/' . $id . '.jpg';
		
		if ( file_exists(ROOT . $file) )
			$image = URL . $file;
		
		require 'application/views/_templates/header.php';
        require 'application/views/teacher/teacher.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteTeacher($id)
    {
        if (isset($id)) {
            $teacher_model = $this->loadModel('TeacherModel');
            $teacher_model->deleteTeacher($id);
        }
		
        header('location: ' . URL . 'teacher/index');
    }
	
    public function deleteImage($id)
    {
        if (isset($id)) {
			$file = ROOT . 'public/upload/teacher/' . $id . '.jpg';
			
			$imgUploader = new imgUploader;
			$imgUploader->delete($file);
			
			header('location: ' . URL . 'teacher/updateteacher/' . $id);
			exit;
        }
		
		header('location: ' . URL . 'teacher/index');
    }
}
