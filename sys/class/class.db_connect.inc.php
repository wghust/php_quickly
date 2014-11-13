<?php
header("Content-Type: text/html; charset=UTF-8");
class DB_Connect {
	protected $db;
	protected function __construct($dbo=NULL) {
		if(is_object($dbo)) {
			$this->db = $dbo;
		} else {
			$dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
			try {
				$this->db = new PDO($dsn,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));
			} catch(Exception $e) {
				die($e->getMessage());
			}
		}
	}
}
?>