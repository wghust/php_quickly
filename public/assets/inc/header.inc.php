<?php
	header("Content-Type: text/html; charset=UTF-8");
	session_start();
	if(isset($_SESSION['user'])) {
		// print_r($_SESSION['user']['group'][0]['ID']);

		$str = "<div class='username'><a href='index.html' class='user_name'>".$_SESSION['user']['username']."</a><a href='logout.html' class='user_out'>退出</a></div>";
		$str .= "<div class='qx'><span>权限</span><ul>";

		$user_power = "";
		$user_group_id = $_SESSION['user']['group_id'];
		if($user_group_id == 1) {
			$user_power = "老大";
		} else {
			if($user_group_id == 2) {
				$user_power = "丞相";
			} else {
				$user_power = "用户";
			}
		}
		$str .= "<li>".$user_power."</li>";
		$str .= "</ul></div>";

		echo $str;
	} else {
		echo "<a href='login.html' class='login'>登录</a>&nbsp;<a href='reg.html' class='reg'>注册</a>";
	}
?>