<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Parents extends Controller
{
	public $_title = 'Veli';
	public $_desc = 'veli işlemleri';
	public $_crumbs = array('Veli');
	public $_action = NULL;
	
    public function index()
    {
        $parent_model = $this->loadModel('ParentModel');
        $parents = $parent_model->getAllParents();
		
		require 'application/views/_templates/header.php';
        require 'application/views/parents/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addParent()
    {		
		$parent_model = $this->loadModel('ParentModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			$birthday = NULL;
			
			if (isset($_POST["birthday"])) {
				$birthday = explode('/', $_POST["birthday"]);
				$birthday = $birthday[2]. '-' .$birthday[1]. '-' .$birthday[0];
			}
			
            $parent_model->addParent($_POST["first_name"],
							$_POST["last_name"],
							$birthday,
							$_POST["gender_id"],
							$_POST["email"],
							$_POST["address"],
							$_POST["phone"]);
			
			$parent_model->parentsToStudent($this->db->lastInsertId(), (array) $_POST["students"]);
			
			$imgUploader = new imgUploader;
			$imgUploader->setDestination(ROOT . 'public/upload/parents/');
			$imgUploader->setAllowedExtensions('jpg');
			$imgUploader->setFileName($this->db->lastInsertId() . '.jpg');
			$imgUploader->upload($_FILES['image']);
			
			header('location: ' . URL . 'parents/index');
			exit;
        }
		
		$this->_action = URL .'parents/addparent';
		$gender = $parent_model->getGender();
		$students = $parent_model->getStudents();
		
		require 'application/views/_templates/header.php';
        require 'application/views/parents/parents.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateParent($id = null)
    {		
		if (empty($id)) exit;
		$parent_model = $this->loadModel('ParentModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
			$birthday = NULL;
			
			if (isset($_POST["birthday"])) {
				$birthday = explode('/', $_POST["birthday"]);
				$birthday = $birthday[2]. '-' .$birthday[1]. '-' .$birthday[0];
			}
			
            $parent_model->updateParent($id,
							$_POST["first_name"],
							$_POST["last_name"],
							$birthday,
							$_POST["gender_id"],
							$_POST["email"],
							$_POST["address"],
							$_POST["phone"]);
			
			$parent_model->parentsToStudent($id, (array) $_POST["students"]);
			
			$imgUploader = new imgUploader;
			$imgUploader->setDestination(ROOT . 'public/upload/parents/');
			$imgUploader->setAllowedExtensions('jpg');
			$imgUploader->setFileName($id . '.jpg');
			$imgUploader->upload($_FILES['image']);
			
			header('location: ' . URL . 'parents/index');
			exit;
        }
		
		$this->_action = URL .'parents/updateparent/'. $id;
		$parents = $parent_model->getParent($id);
		$gender = $parent_model->getGender();
		$students = $parent_model->getStudents();
		$parents_to_student = arrayFlatten($parent_model->getParentsToStudent($id));
		
		$file = 'public/upload/parents/' . $id . '.jpg';
		
		if ( file_exists(ROOT . $file) )
			$image = URL . $file;
		
		require 'application/views/_templates/header.php';
        require 'application/views/parents/parents.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteParent($id)
    {
        if (isset($id)) {
            $parent_model = $this->loadModel('ParentModel');
            $parent_model->deleteParent($id);
        }
		
        header('location: ' . URL . 'parents/index');
    }
	
    public function deleteImage($id)
    {
        if (isset($id)) {
			$file = ROOT . 'public/upload/parents/' . $id . '.jpg';
			
			$imgUploader = new imgUploader;
			$imgUploader->delete($file);
			
			header('location: ' . URL . 'parents/updateparent/' . $id);
			exit;
        }
		
		header('location: ' . URL . 'parents/index');
    }
}
