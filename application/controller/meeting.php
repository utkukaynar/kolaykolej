<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Meeting extends Controller
{
	public $_title = 'Görüşmeler';
	public $_desc = 'görüşmeleri yönet';
	public $_crumbs = array('Görüşmeler');
	public $_action = NULL;
	
    public function index()
    {
        $meeting_model = $this->loadModel('MeetingModel');
        $meetings = $meeting_model->getAllMeetings();
		
		require 'application/views/_templates/header.php';
        require 'application/views/meeting/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addMeeting($parent_id = NULL)
    {		
		$meeting_model = $this->loadModel('MeetingModel');
		
		if (isset($_POST["submit"])) {
			$date = NULL;
			
			if (isset($_POST["date"])) {
				$date = explode('/', $_POST["date"]);
				$date = $date[2]. '-' .$date[1]. '-' .$date[0];
			}
			
            $meeting_model->addMeeting($_POST["parent_id"],
							$_POST["communication_id"],
							$_POST["subject"],
							$_POST["content"],
							$date);
			
			header('location: ' . URL . 'meeting/index');
			exit;
        }
		
		$this->_action = URL .'meeting/addmeeting';
		$parents = $meeting_model->getParents();
		$communications = $meeting_model->getCommunications();
		$date = date('d/m/Y', time());
		
		require 'application/views/_templates/header.php';
        require 'application/views/meeting/meeting.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateMeeting($id = null)
    {
	    if (empty($id)) exit;
		$meeting_model = $this->loadModel('MeetingModel');
		
		if (isset($_POST["submit"])) {
			$date = NULL;
			
			if (isset($_POST["date"])) {
				$date = explode('/', $_POST["date"]);
				$date = $date[2]. '-' .$date[1]. '-' .$date[0];
			}
			
            $meeting_model->updateMeeting($id,
							$_POST["parent_id"],
							$_POST["communication_id"],
							$_POST["subject"],
							$_POST["content"],
							$date);
			
			header('location: ' . URL . 'meeting/index');
			exit;
        }
		
		$this->_action = URL .'meeting/updatemeeting/'. $id;
		$meeting = $meeting_model->getMeeting($id);
		$parent_id = $meeting->parent_id;
		$parents = $meeting_model->getParents();
		$communications = $meeting_model->getCommunications();
		
		require 'application/views/_templates/header.php';
        require 'application/views/meeting/meeting.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteMeeting($id)
    {
        if (isset($id)) {
            $meeting_model = $this->loadModel('MeetingModel');
            $meeting_model->deleteMeeting($id);
        }
		
        header('location: ' . URL . 'meeting/index');
    }
}
