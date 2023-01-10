<?php
	class Project{
		//ATTRIBUTES
		private $id;
		private $company;
		private $project;
		private $status;
		private $note;
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
