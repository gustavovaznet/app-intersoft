<?php
	class Info{
		//ATTRIBUTES
		private $id;
		private $question;
		private $answer;
		private $date_register;
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
