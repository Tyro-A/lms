<?php 
//Start Session
require_once("functions.php");
session_start();

//Create Constants to save Database Credentials
define("APP_PATH", dirname(__FILE__) . "\\..\\");
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'task_manager');

define('SITEURL', 'http://localhost/task-manager/');

?>