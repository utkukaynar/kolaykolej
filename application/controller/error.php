<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Error extends Controller
{	
	public $_title = 'Hata';
	public $_desc = 'hata yönetimi';
	public $_crumbs = array('Hata');
	
    public function index()
    {
        require 'application/views/error/index.php';
    }
	
    public function permission()
    {
		$message = 'Bu sayfaya erişmek için yetkiniz yok, sistem yöneticinize başvurun.';
		
		require 'application/views/_templates/header.php';
        require 'application/views/error/error.php';
        require 'application/views/_templates/footer.php';
    }
}
