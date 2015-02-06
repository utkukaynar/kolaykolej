<?php

/**
 * A simple PHP MVC skeleton
 *
 * @package php-mvc
 * @author Panique
 * @link http://www.php-mvc.net
 * @link https://github.com/panique/php-mvc/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// start on buffering
ob_start();

// load application config (error reporting etc.)
require 'application/config/config.php';

// load application library
require 'application/libs/library.php';

// session start
session_start();

// user access control
$secure = new Secure();
$secure->login();
$secure->permission();

// start the application
$app = new Application();
