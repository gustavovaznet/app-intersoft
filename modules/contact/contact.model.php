<?php
	class Contact{
		//ATTRIBUTES
		private $id;
		private $name;
		private $phone;
		private $mail;
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
