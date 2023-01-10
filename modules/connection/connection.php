<?php
	//DB CONNECTION
	class Connection{

		//VARIABLES
		private $host = 'localhost';
		private $dbname = 'db_name_here';
		private $user = 'db_user_here';
		private $pass = 'db_password_here';
		
		//CONNECT FUNCTION
		public function connect(){
			$connection = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass",
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4")
			);
			return $connection;
		}
	}
?>
