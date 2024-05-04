<?php 

require_once("functions.php");


//Create Constants to save Database Credentials
define("APP_PATH", dirname(__FILE__) . "\\..\\");
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'task_manager');

define('SITEURL', 'http://localhost/task-manager/');
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,DB_NAME);

?>