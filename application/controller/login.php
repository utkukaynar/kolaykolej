<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{	
    public function index()
    {
        require 'application/views/login/index.php';
    }
	
    public function logout()
    {		
		unset( $_SESSION['user'] );
		session_destroy();
		
		header('location: ' . URL . 'login/index');
    }
	
    public function access()
    {
		$login_model = $this->loadModel('LoginModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
			$user = $login_model->getUser($_POST["username"], md5($_POST["password"]));
			
			if (!empty($user)) {
				$user->permission = unserialize($user->permission);
				$_SESSION['user'] = (array) $user;
				
				header('location: ' . URL . 'home/index');
				exit;
			}
        }
		
		header('location: ' . URL . 'login/index');
    }
}
