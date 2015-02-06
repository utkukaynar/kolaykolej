<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class UserGroup extends Controller
{
	public $_title = 'Kullanıcı Grupları';
	public $_desc = 'kullanıcı gruplarını yönet';
	public $_crumbs = array('Kullanıcı Grupları');
	public $_action = NULL;
	
    public function index()
    {
        $usergroup_model = $this->loadModel('UserGroupModel');
        $usergroups = $usergroup_model->getAllUserGroups();
		
		require 'application/views/_templates/header.php';
        require 'application/views/usergroup/index.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function addUserGroup()
    {
		$usergroup_model = $this->loadModel('UserGroupModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
            $usergroup_model->addUserGroup($_POST["name"], serialize($_POST["permission"]));
			
			header('location: ' . URL . 'usergroup/index');
			exit;
        }
		
		$this->_action = URL .'usergroup/addusergroup';
		$permissions = $this->getPermissions();
		
		require 'application/views/_templates/header.php';
        require 'application/views/usergroup/usergroup.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function updateUserGroup($id = null)
    {
	    if (empty($id)) exit;
		$usergroup_model = $this->loadModel('UserGroupModel');
		
		if (isset($_POST["submit"])) {
			$_POST = array_map('stripTagsDeep', $_POST);
            $usergroup_model->updateUserGroup($id, $_POST["name"], serialize($_POST["permission"]));
			
			header('location: ' . URL . 'usergroup/index');
			exit;
        }
		
		$this->_action = URL .'usergroup/updateusergroup/'. $id;
		$usergroup = $usergroup_model->getUserGroup($id);
		$usergroup->permission = unserialize($usergroup->permission);
		$permissions = $this->getPermissions();
		
		require 'application/views/_templates/header.php';
        require 'application/views/usergroup/usergroup.php';
        require 'application/views/_templates/footer.php';
    }
	
    public function deleteUserGroup($id)
    {
        if (isset($id)) {
            $usergroup_model = $this->loadModel('UserGroupModel');
            $usergroup_model->deleteUserGroup($id);
        }
		
        header('location: ' . URL . 'usergroup/index');
    }
	
	private function getPermissions() {
		$permissions = array();
		
		$ignore = array(
			'home',
			'login',
			'error',
			'screenlock',
			'search',
			'ajax'
		);
		
		$files = glob(ROOT . 'application/controller/*.php');
		
		foreach ($files as $file) {
			$permission = basename($file, '.php');
			
			if (!in_array($permission, $ignore)) {
				$permissions[] = $permission;
			}
		}
		
		return $permissions;
	}
}

