<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class User extends Controller
{
	public $_title = 'Kullanıcılar';
	public $_desc = 'kullanıcı işlemleri';
	public $_crumbs = array('Kullanıcılar');
	public $_action = NULL;
	
    public function index()
    {
        $user_model = $this->loadModel('UserModel');
        $users = $user_model->getAllUsers();
		
		require 'application/views/_templates/header.php';
        require 'application/views/user/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addUser()
    {
		$user_model = $this->loadModel('UserModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
			( isset($_POST['status']) ) ? $status = $_POST['status'] : $status = 0;
			
            $user_model->addUser($_POST["user_group_id"],
							$_POST["username"],
							md5($_POST["password"]),
							$_POST["first_name"],
							$_POST["last_name"],
							$_POST["email"],
							$status);
			
			header('location: ' . URL . 'user/index');
			exit;
        }
		
		$this->_action = URL .'user/adduser';
		$user_groups = $user_model->getUserGroups();
		
		require 'application/views/_templates/header.php';
        require 'application/views/user/user.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateUser($id = null)
    {
	    if (empty($id)) exit;
		$user_model = $this->loadModel('UserModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('strip_tags', $_POST);
			( isset($_POST['status']) ) ? $status = $_POST['status'] : $status = 0;
			
            $user_model->updateUser($id,
							$_POST["user_group_id"],
							$_POST["username"],
							md5($_POST["password"]),
							$_POST["first_name"],
							$_POST["last_name"],
							$_POST["email"],
							$status);
			
			header('location: ' . URL . 'user/index');
			exit;
        }
		
		$this->_action = URL .'user/updateuser/'. $id;
		$user = $user_model->getUser($id);
		$user_groups = $user_model->getUserGroups();
		
		require 'application/views/_templates/header.php';
        require 'application/views/user/user.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteUser($id)
    {
        if (isset($id)) {
            $user_model = $this->loadModel('UserModel');
            $user_model->deleteUser($id);
        }
		
        header('location: ' . URL . 'user/index');
    }
}

