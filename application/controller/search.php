<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Search extends Controller
{	
	public $_title = 'Arama';
	public $_desc = 'Arama Sonuçları';
	public $_crumbs = array('Arama');
	public $_action = NULL;
	
    public function index()
    {
		$search_model = $this->loadModel('SearchModel');
		
		if (isset($_POST["key"]) && !empty($_POST["key"])) {
			$_POST = array_map('strip_tags', $_POST);
            $results = $search_model->getResults($_POST["key"]);
        }
		
		$this->_action = URL .'search/index';
		
		require 'application/views/_templates/header.php';
        require 'application/views/search/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function getParent($id = null)
    {
		if (empty($id)) exit;
		$search_model = $this->loadModel('SearchModel');
		$parent = $search_model->getParent($id);
		$students = $search_model->getStudents($id);
		$meetings = $search_model->getMeetings($id);
		$gender = arrayAlign($search_model->getGender());
		
		$file = 'public/upload/parents/' . $id . '.jpg';
		
		if ( file_exists(ROOT . $file) )
			$image = URL . $file;
		
		require 'application/views/_templates/header.php';
		require 'application/views/search/parent.php';
		require 'application/views/_templates/footer.php';  
    }
}
