<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Season extends Controller
{
	public $_title = 'Sezonlar';
	public $_desc = 'sezonları yönet';
	public $_crumbs = array('Sezonlar');
	public $_action = NULL;
	
    public function index()
    {
        $season_model = $this->loadModel('SeasonModel');
        $seasons = $season_model->getAllSeasons();
		
		require 'application/views/_templates/header.php';
        require 'application/views/season/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addSeason()
    {		
		$season_model = $this->loadModel('SeasonModel');
		
		if (isset($_POST["submit"])) {
            $season_model->addSeason($_POST["name"]);
			
			header('location: ' . URL . 'season/index');
			exit;
        }
		
		$this->_action = URL .'season/addseason';
		
		require 'application/views/_templates/header.php';
        require 'application/views/season/season.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateSeason($id = null)
    {
	    if (empty($id)) exit;
		$season_model = $this->loadModel('SeasonModel');
		
		if (isset($_POST["submit"])) {
            $season_model->updateSeason($id, $_POST["name"]);
			
			header('location: ' . URL . 'season/index');
			exit;
        }
		
		$this->_action = URL .'season/updateseason/'. $id;
		$season = $season_model->getSeason($id);
		
		require 'application/views/_templates/header.php';
        require 'application/views/season/season.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteSeason($id)
    {
        if (isset($id)) {
            $season_model = $this->loadModel('SeasonModel');
            $season_model->deleteSeason($id);
        }
		
        header('location: ' . URL . 'season/index');
    }
}
