<?php
	class Schedule{
		//ATTRIBUTES
		private $id;
		private $date;
		private $month;
		private $company_worker;
		private $home_worker;
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
