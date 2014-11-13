<?php
// session_start();
// if(!isset($_SESSION['token'])) {
// 	$_SESSION['token'] = sha1(uniqid(mt_rand(),TRUE));
// }
// var_dump("right");exit;
include_once '../../../sys/config/db-cred.inc.php';
foreach($C as $name => $val) {
	define($name,$val);
}
$dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
$dbo = new PDO($dsn,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));
// var_dump($dbo);exit;
function __autoload($class) {
	$filename = "../../../sys/class/class.".strtolower($class).".inc.php";
	if(file_exists($filename)) {
		include_once $filename;
	}
}
?>