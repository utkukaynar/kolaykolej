<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ScreenLock extends Controller
{	
    public function index()
    {
		$_SESSION['locked'] = true;
		
        require 'application/views/screenlock/index.php';
    }
	
    public function lock()
    {
		$screenlock_model = $this->loadModel('ScreenLockModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
			$user = $screenlock_model->getUser($_SESSION['user']['username'], md5($_POST["password"]));
			
			if (!empty($user)) {
				unset( $_SESSION['locked'] );
				
				header('location: ' . URL . 'home/index');
				exit;
			}
        }
		
		header('location: ' . URL . 'screenlock/index');
    }
	
    public function changeAccount()
    {
		unset( $_SESSION['locked'] );
		unset( $_SESSION['user'] );
		session_destroy();
		
        header('location: ' . URL . 'login/index');
    }
}
