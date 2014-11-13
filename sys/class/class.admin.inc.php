<?php
header("Content-Type: text/html; charset=UTF-8");
class admin extends DB_Connect {
	private $_saltLength = 7;
	public function __construct($dbo = NULL, $saltLength = NULL) {
		parent::__construct($dbo);
		if(is_int($saltLength)) {
			$this->_saltLength = $saltLength;
		}
	}
	public function regform() {
		$username = htmlentities($_POST['username'],ENT_QUOTES);
		$email = htmlentities($_POST['email'],ENT_QUOTES);
		$password = htmlentities($_POST['password'],ENT_QUOTES);
		$sql = "select * from userinf where email=:email LIMIT 1";
		try {
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':email',$email,PDO::PARAM_STR);
			$flag = $stmt->execute();
			$user = array_shift($stmt->fetchAll());
			$stmt->closeCursor();
		} catch(Exception $e) {
			die($e->getMessage());
		}
		if(!isset($user)) {
			$sql = "insert into userinf (username,password,email) values(:username,:password,:email)";
			try {
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(':username',$username,PDO::PARAM_STR);
				$stmt->bindParam(':email',$email,PDO::PARAM_STR);
				$stmt->bindParam(':password',$password,PDO::PARAM_STR);
				$flag = $stmt->execute();
				$stmt->closeCursor();
				if($flag) {
					$_SESSION['user'] = array(
						'username' => $username,
						'email' => $email,
						);
					return 1;
				} else {
					return 2;
				}
			} catch(Exception $e) {
				die($e->getMessage());
			}
		} else {
			return 0;
		}
 	}
 	public function loginform() {
 		$username = htmlentities($_POST['username'],ENT_QUOTES);
		$password = htmlentities($_POST['password'],ENT_QUOTES);
		$password = md5($password);
		$sql = "select * from stat_user where username=:username LIMIT 1";
		try {
			// 数据库
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':username',$username,PDO::PARAM_STR);
			$flag = $stmt->execute();
			$user = array_shift($stmt->fetchAll());
			$stmt->closeCursor();
			if(isset($user)&&($password == $user['password'])) {
				$_SESSION['user'] = array(
					'userid' => $user['uid'],
					'group_id' => $user['group_id'],
					'username' => $user['username']
					);
				return 0;
			} else {
				return 1;
			}

		} catch(Exception $e) {
			return 2;
		}
 	}
} 
?>