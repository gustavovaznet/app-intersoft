<?php

	class ScheduleService{

		private $connection;
		private $schedule;
		
		//CONSTRUCT
		public function __construct(Connection $connection, Schedule $schedule){
			$this->connection = $connection->connect();
			$this->schedule = $schedule;
		}
		
		//INSERT
		public function insert(){
			$query = 'insert into tb_schedule(date, company_worker, home_worker, month)values(:date, :company_worker, :home_worker, :month)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':date',$this->schedule->__get('date'));
			$stmt->bindValue(':month',$this->schedule->__get('month'));
			$stmt->bindValue(':company_worker',$this->schedule->__get('company_worker'));
			$stmt->bindValue(':home_worker',$this->schedule->__get('home_worker'));
			$stmt->execute();
		}
		
		//RECOVER
		public function recover(){
			$query = "select id, DATE_FORMAT( `date` , '%d/%c/%Y' ) AS `date`, company_worker, home_worker, month from tb_schedule";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}		
		
		//UPDATE
		public function update(){
			$query = 'update tb_schedule set date = :date, month = :month, company_worker = :company_worker, home_worker = :home_worker where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':date',$this->schedule->__get('date'));
			$stmt->bindValue(':month',$this->schedule->__get('month'));
			$stmt->bindValue(':company_worker',$this->schedule->__get('company_worker'));
			$stmt->bindValue(':home_worker',$this->schedule->__get('home_worker'));
			$stmt->bindValue(':id',$this->schedule->__get('id'));
			$stmt->execute();
		}
		
		//DELETE
		public function delete(){
			$query = 'delete from tb_schedule where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->schedule->__get('id'));
			$stmt->execute();
		}

		//SEARCH
		public function search() {
			$schedule_search = $_POST['schedule_search'];	
			$query = "select id, DATE_FORMAT( `date` , '%d/%c/%Y' ) AS `date`, month, company_worker, home_worker from tb_schedule where date LIKE '%$schedule_search%' or month LIKE '%$schedule_search%' or company_worker LIKE '%$schedule_search%' or home_worker LIKE '%$schedule_search%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER FOR UPDATE
		public function recover_for_update(){
			$query = 'select id, date, month, company_worker, home_worker from tb_schedule where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->schedule->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

	}

?>
