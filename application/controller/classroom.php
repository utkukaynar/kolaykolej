<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Classroom extends Controller
{
	public $_title = 'Sınıf';
	public $_desc = 'sınıfları yönet';
	public $_crumbs = array('Sınıf');
	public $_action = NULL;
	
    public function index()
    {
        $classroom_model = $this->loadModel('ClassroomModel');
		$season = $classroom_model->getSeasons();
		
		if (isset($_POST["submit"])) {
			$season_id = $_POST["season_id"];
        } else {
			$last_season = end($season);
			$season_id = $last_season->id;
		}
		
		$this->_action = URL .'classroom/index';
		$classrooms = $classroom_model->getAllClassrooms($season_id);
		
		require 'application/views/_templates/header.php';
        require 'application/views/classroom/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addClassroom()
    {		
		$classroom_model = $this->loadModel('ClassroomModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
            $classroom_model->addClassroom($_POST["season_id"],
								$_POST["name"],
								$_POST["description"]);
			
			header('location: ' . URL . 'classroom/index');
			exit;
        }
		
		$this->_action = URL .'classroom/addclassroom';
		$season = $classroom_model->getSeasons();
		
		require 'application/views/_templates/header.php';
        require 'application/views/classroom/classroom.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateClassroom($id = null)
    {
	    if (empty($id)) exit;
		$classroom_model = $this->loadModel('ClassroomModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
            $classroom_model->updateClassroom($id,
								$_POST["season_id"],
								$_POST["name"],
								$_POST["description"]);
			
			header('location: ' . URL . 'classroom/index');
			exit;
        }
		
		$this->_action = URL .'classroom/updateclassroom/'. $id;
		$classroom = $classroom_model->getClassroom($id);
		$season = $classroom_model->getSeasons();
		
		require 'application/views/_templates/header.php';
        require 'application/views/classroom/classroom.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteClassroom($id)
    {
        if (isset($id)) {
            $classroom_model = $this->loadModel('ClassroomModel');
            $classroom_model->deleteClassroom($id);
        }
		
        header('location: ' . URL . 'classroom/index');
    }
}
