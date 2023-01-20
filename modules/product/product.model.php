<?php
	class Product{
		//ATTRIBUTES
		private $id;
		private $product;
		private $model;
		private $amount;
		private $snumber;
		private $anumber;
		private $function;
		private $company;
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
