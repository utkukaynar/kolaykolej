<?php

class Secure {
	public static $route = NULL;
	public static $permission = array();
	public $ignore = array(
				'home',
				'login',
				'error',
				'screenlock',
				'search',
				'ajax'
			);
	
    function __construct() {
        self::$route = $this->getRoute();			
    }
	
	private function getRoute() {		
		// $url = parse_url(URL, PHP_URL_PATH);
		$url = substr($_SERVER['REQUEST_URI'], 1);
		$url = explode('/', $url);
		
		return $url[0];
	}
	
	public function login() {
		if ( !isset($_SESSION['user']) ) {
			if ( self::$route != 'login' ) {
				header('location: ' . URL . 'login/index');
			}
		} else {
			self::$permission = $_SESSION['user']['permission'];
		}
	}
	
	public static function hasPermission($route) {
		return in_array($route, self::$permission);
	}
	
	public function permission() {
		if ( !in_array(self::$route, $this->ignore) ) {
			if ( !$this->hasPermission(self::$route) ) {
				header('location: ' . URL . 'error/permission');
			}
			
			if ( isset($_SESSION['locked']) ) {
				header('location: ' . URL . 'screenlock/index');
			}
		}
	}
}