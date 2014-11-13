<?php 
	header('Content-Type:text/html;charset=utf8_bin');
	header("Access-Control-Allow-Origin: *");
	header("Cache-Control: no-cache, must-revalidate");
	session_start();
	if(!$_SESSION['user']) {
		header('Location:../../login.html');
	}
	// include_once '../../../sys/config/db-cred.inc.php';
	// include_once '../../../sys/config/classauto.inc.php';
	include_once '../../../sys/core/init.inc.php';
	// foreach ($C as $name => $val) {
	// 	define($name,$val);
	// }
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="renderer" content="webkit">
		<!--[if IE]>
		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<title>ANAMARY</title>
		<link rel="Shortcut Icon" href="../../assets/images/favicon.ico"  type="text/css">

		<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-datetimepicker.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../../assets/jquery_table/css/jquery.dataTables.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/data.css">
		<script type="text/javascript" src="../../assets/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="../../assets/js/locales/bootstrap-datetimepicker.fr.js"></script>
		<script type="text/javascript" src="../../assets/js/echarts-plain.js"></script>
		<script type="text/javascript" src="../../assets/jquery_table/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			function showlist(element) {
		        element.hover(function() {
		            var _this = $(this);
		            _this.children("ul").css({
		                'display': 'block'
		            });
		            _this.children("ul").animate({
		                'margin-top': '5px',
		                'opacity': '1'
		            }, 200);
		        }, function() {
		            var _this = $(this);
		            _this.children("ul").animate({
		                'margin-top': '0px',
		                'opacity': '0'
		            }, 200, function() {
		                _this.children("ul").css({
		                    'display': 'none'
		                });
		            });
		        });
		    }
		    showlist($(".qx"));
		});
		</script>
	</head>
	<body>
		<div class="header">
			<div class="container">
				<div class="navleft">
					<div class="username">
						<a href='../index/index.php' class="user_name"><?php echo $_SESSION['user']['username']; ?></a><!-- <a href="../../logout.html" class="user_out">退出</a> -->
					</div>
					<div class="qx">
						<span>权限</span>
						<ul>
							<?php
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
								echo "<li><a href='' onClick='javascript:return false;'>".$user_power."</a></li>";
							?>
							<li>
								<a href="../user/changepassword.php">修改密码</a>
							</li>
							<li>
								<a href="../../logout.html">退出</a>
							</li>
						</ul>
					</div>
					<!-- <div class="username">wangbinbin</div>
					<div class="qx">
						<span>权限</span>
						<ul>
							<li>admin</li>
							<li>admin</li>
						</ul>
					</div> -->
				</div>
				<!-- <div class="toptitle"></div> -->
				<div class="search">
					<form action="no_power.php" method="post">
						<input type="text" name="s" placeholder="搜索">
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="topover"></div>