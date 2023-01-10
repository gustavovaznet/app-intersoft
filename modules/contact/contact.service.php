<?php

	class ContactService{

		private $connection;
		private $contact;
		
		//CONSTRUCT
		public function __construct(Connection $connection, Contact $contact){
			$this->connection = $connection->connect();
			$this->contact = $contact;
		}
		
		//INSERT
		public function insert(){
			$query = 'insert into tb_contacts(name, phone, mail)values(:name, :phone, :mail)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->contact->__get('name'));
			$stmt->bindValue(':phone',$this->contact->__get('phone'));
			$stmt->bindValue(':mail',$this->contact->__get('mail'));
			$stmt->execute();
		}
		
		//RECOVER
		public function recover(){
			$query = "select id, name, phone, mail from tb_contacts";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		
		//UPDATE
		public function update(){
			$query = 'update tb_contacts set name = :name, phone = :phone, mail = :mail where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->contact->__get('name'));
			$stmt->bindValue(':phone',$this->contact->__get('phone'));
			$stmt->bindValue(':mail',$this->contact->__get('mail'));
			$stmt->bindValue(':id',$this->contact->__get('id'));
			$stmt->execute();
		}
		
		//DELETE
		public function delete(){
			$query = 'delete from tb_contacts where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->contact->__get('id'));
			$stmt->execute();
		}

		//SEARCH
		public function search() {
			$contact_search = $_POST['contact_search'];	
			$query = "select id, name, phone, mail from tb_contacts where name LIKE '%$contact_search%' or phone LIKE '%$contact_search%' or mail LIKE '%$contact_search%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER FOR UPDATE
		public function recover_for_update(){
			$query = 'select id, name, phone, mail from tb_contacts where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->contact->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

	}

?>
