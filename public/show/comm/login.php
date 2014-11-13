<?php
header('Content-Type:text/html;charset=utf8_bin');
session_start();
// var_dump("right");exit;
// include_once '../../../sys/config/db-cred.inc.php';
include_once '../../../sys/core/init.inc.php';
// include_once '../../../sys/config/classauto.inc.php';
// foreach ($C as $name => $val) {
// 	define($name,$val);
// }
$obj = new admin($dbo);
$msg=$obj->loginform();
echo $msg;
?>