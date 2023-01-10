<?php
	class InfoService{

		private $connection;
		private $info;

		public function __construct(Connection $connection, Info $info){
			$this->connection = $connection->connect();
			$this->info = $info;
		}
		
		//INSERT
		public function insert(){
			$query = 'insert into tb_info(question, answer)values(:question, :answer)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':question',$this->info->__get('question'));
			$stmt->bindValue(':answer',$this->info->__get('answer'));
			$stmt->execute();
		}

		//RECOVER
		public function recover(){
			$query =	'select	id, question, answer from tb_info';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//UPDATE
		public function update(){
			$query = 'update tb_info set question = :question, answer = :answer where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':question',$this->info->__get('question'));
			$stmt->bindValue(':answer',$this->info->__get('answer'));
			$stmt->bindValue(':id',$this->info->__get('id'));
			$stmt->execute();
		}

		//DELETE
		public function delete(){
			$query = 'delete from tb_info where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->info->__get('id'));
			$stmt->execute();
		}

		//SEARCH
		public function search() {
			$info_search = $_POST['info_search'];	
			$query = "select id, question, answer from tb_info where question LIKE '%$info_search%' or answer LIKE '%$info_search%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER FOR UPDATE
		public function recover_for_update(){
			$query = 'select id, question, answer from tb_info where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->info->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>
