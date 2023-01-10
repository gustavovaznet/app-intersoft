<?php
	class Ext{
		//ATTRIBUTES
		private $id;
		private $name;
		private $department;
		private $ext;
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
