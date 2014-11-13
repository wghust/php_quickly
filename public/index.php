<?php
	session_start();
	if(!$_SESSION['user']) {
		header('Location:./login.html');
	} else {
		if($_SESSION['user']['group_id'] <= 2) {
			header('Location:./show/index/index.php');
		} else {
			header('Location:./show/datapage/platform.php');
		}
	}
?>