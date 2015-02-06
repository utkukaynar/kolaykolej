<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Settings
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("output_buffering", "on");

/**
 * Configuration for: Project Information
 */
define('URL', 'http://kolaykolej.medianatolia.com/');
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/kolaykolej/');
define('TITLE', 'Kolay Kolej');
define('DESC', 'Okul Yönetim Sistemi');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'kolaykolej.db.7692377.hostedresource.com');
define('DB_NAME', 'kolaykolej');
define('DB_USER', 'kolaykolej');
define('DB_PASS', 'Fox@110672');
