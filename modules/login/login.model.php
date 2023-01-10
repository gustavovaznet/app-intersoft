<?php
	class Login{
		//ATTRIBUTES
		private $id;
		private $name;
		private $surname;
		private $mail;
		private $password;
		private $type;
		//GET
		public function __get($attribute){
			return $this->$attribute;
		}
		//SET
		public function __set($attribute, $value){
			$this->$attribute = $value;
			return $this;
		}
	}
?>
