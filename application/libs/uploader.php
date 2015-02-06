<?php

/**
 * Simple PHP Class used for uploading files and images
 *
 */

class imgUploader {
	// default settings
	private $destination = '';
	private $fileName = '';
	private $maxSize = '1048576'; // bytes (1048576 bytes = 1 meg)
	private $allowedExtensions = array('jpg','jpeg','png');
	private $printError = true;
	public $error = '';
	
	// START: Functions to Change Default Settings
	public function setDestination($newDestination) {
		$this->destination = $newDestination;
	}
	
	public function setFileName($newFileName) {
		$this->fileName = $newFileName;
	}
	
	public function setPrintError($newValue) {
		$this->printError = $newValue;
	}
	
	public function setMaxSize($newSize) {
		$this->maxSize = $newSize;
	}
	
	public function setAllowedExtensions($newExtensions) {
		if (is_array($newExtensions)) {
			$this->allowedExtensions = $newExtensions;
		} else {
			$this->allowedExtensions = array($newExtensions);
		}
	}
	// END: Functions to Change Default Settings
	
	// START: Process File Functions
	public function upload($file) {
		$this->validate($file);
		
		if ($this->error) {
			if ($this->printError) print $this->error;
		} else {
			move_uploaded_file($file['tmp_name'][0], $this->destination.$this->fileName) or $this->error .= 'Destination Directory Permission Problem.<br />';
			if ($this->error && $this->printError) print $this->error;
		}
	}
	
	public function delete($file) {
		if (file_exists($file)) {
			unlink($file) or $this->error .= 'Destination Directory Permission Problem.<br />';
		} else {
			$this->error .= 'File not found! Could not delete: '.$file.'<br />';
		}
		
		if ($this->error && $this->printError) print $this->error;
	}
	// END: Process File Functions
	
	// START: Helper Functions
	public function validate($file) {
		$error = '';
		
		// check file exist
		if (empty($file['name'][0])) $error .= 'No file found.<br />';
		// check allowed extensions
		if (!in_array($this->getExtension($file),$this->allowedExtensions)) $error .= 'Extension is not allowed.<br />';
		// check file size
		if ($file['size'][0] > $this->maxSize) $error .= 'Max File Size Exceeded. Limit: '.$this->maxSize.' bytes.<br />';
		
		$this->error = $error;
	}
	
	public function getExtension($file) {
		$filepath = $file['name'][0];
		$ext = pathinfo($filepath, PATHINFO_EXTENSION);
		return $ext;
	}
	// END: Helper Functions
}

/*
Here are some examples of how it can be used to upload form files. For this example we will be uploading two images to two different directories.

//form data
//$_FILES['profileimage']
//$_FILES['thumbnailimage']
 
//include the code above
include('filemanager.php');
 
$imgUploader = new fileManager;
 
$imgUploader->setDestination($_SERVER['DOCUMENT_ROOT'] . '/images/profiles/');
$imgUploader->setAllowedExtensions('jpg');
$imgUploader->setFileName('user_profile.jpg');
$imgUploader->upload($_FILES['profileimage']);
 
$imgUploader->setDestination($_SERVER['DOCUMENT_ROOT'] . '/images/thumbs/');
$imgUploader->setAllowedExtensions(array('jpg','gif','png'));
$imgUploader->setFileName($_FILES['thumbnailimage']['tmp_name'][0]);
$imgUploader->upload($_FILES['thumbnailimage']);

Notice, I didn't set $imgUploader->setPrintError to false, so it will automatically print errors on screen if they occur. If you wanted to handle your own error messages, you could do the following using the same above example:

//form data
//$_FILES['profileimage']
//$_FILES['thumbnailimage']

//include the code above
include('filemanager.php');
 
$imgUploader = new fileManager;
$imgUploader->setPrintError(FALSE);
 
//store errors
$errors = '';
 
$imgUploader->setDestination($_SERVER['DOCUMENT_ROOT'] . '/images/profiles/');
$imgUploader->setAllowedExtensions('jpg');
$imgUploader->setFileName('user_profile.jpg');
$imgUploader->upload($_FILES['profileimage']);
$errors .= $imgUploader->error;
 
$imgUploader->setDestination($_SERVER['DOCUMENT_ROOT'] . '/images/thumbs/');
$imgUploader->setAllowedExtensions(array('jpg','gif','png'));
$imgUploader->setFileName($_FILES['thumbnailimage']['tmp_name'][0]);
$imgUploader->upload($_FILES['thumbnailimage']);
$errors .= $imgUploader->error;
 
if ($errors) print $errors;
*/