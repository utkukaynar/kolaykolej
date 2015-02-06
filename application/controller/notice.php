<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Notice extends Controller
{
	public $_title = 'Duyurular';
	public $_desc = 'duyurular yönet';
	public $_crumbs = array('Duyurular');
	public $_action = NULL;
	
    public function index()
    {
        $notice_model = $this->loadModel('NoticeModel');
        $notices = $notice_model->getAllNotices();
		
		require 'application/views/_templates/header.php';
        require 'application/views/notice/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addNotice()
    {		
		$notice_model = $this->loadModel('NoticeModel');
		
		if (isset($_POST["submit"])) {
            $notice_model->addNotice($_POST["name"],
							$_POST["description"],
							$_POST["content"]);
			
			header('location: ' . URL . 'notice/index');
			exit;
        }
		
		$this->_action = URL .'notice/addnotice';
		
		require 'application/views/_templates/header.php';
        require 'application/views/notice/notice.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateNotice($id = null)
    {
	    if (empty($id)) exit;
		$notice_model = $this->loadModel('NoticeModel');
		
		if (isset($_POST["submit"])) {
            $notice_model->updateNotice($id,
							$_POST["name"],
							$_POST["description"],
							$_POST["content"]);
			
			header('location: ' . URL . 'notice/index');
			exit;
        }
		
		$this->_action = URL .'notice/updatenotice/'. $id;
		$notice = $notice_model->getNotice($id);
		
		require 'application/views/_templates/header.php';
        require 'application/views/notice/notice.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteNotice($id)
    {
        if (isset($id)) {
            $notice_model = $this->loadModel('NoticeModel');
            $notice_model->deleteNotice($id);
        }
		
        header('location: ' . URL . 'notice/index');
    }
}
