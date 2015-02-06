<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Ajax extends Controller
{	
    public function index()
    {
		exit;
    }
	
    public function getClassroom($id)
    {
		$ajax_model = $this->loadModel('AjaxModel');
		$result = $ajax_model->getClassroom($id);
		
        require 'application/views/ajax/ajax.php';
    }
}
