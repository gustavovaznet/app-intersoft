<?php
	class ExtService{

		private $connection;
		private $ext;
		
		//CONSTRUCT
		public function __construct(Connection $connection, Ext $ext){
			$this->connection = $connection->connect();
			$this->ext = $ext;
		}
		
		//INSERT
		public function insert(){
			$query = 'insert into tb_ext(name, department, ext)values(:name, :department, :ext)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->ext->__get('name'));
			$stmt->bindValue(':department',$this->ext->__get('department'));
			$stmt->bindValue(':ext',$this->ext->__get('ext'));
			$stmt->execute();
		}
		
		//RECOVER
		public function recover(){
			$query =	'select	id, name, department, ext from tb_ext';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}		
		
		//UPDATE
		public function update(){
			$query = 'update tb_ext set name = :name, department = :department, ext = :ext where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->ext->__get('name'));
			$stmt->bindValue(':department',$this->ext->__get('department'));
			$stmt->bindValue(':ext',$this->ext->__get('ext'));
			$stmt->bindValue(':id',$this->ext->__get('id'));
			$stmt->execute();
		}
		
		//DELETE
		public function delete(){
			$query = 'delete from tb_ext where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->ext->__get('id'));
			$stmt->execute();
		}

		//SEARCH
		public function search() {
			$ext_search = $_POST['ext_search'];
			$query = "select id, name, department, ext from tb_ext where name LIKE '%$ext_search%' or department LIKE '%$ext_search%' or ext LIKE '%$ext_search%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER FOR UPDATE
		public function recover_for_update(){
			$query = 'select id, name, department, ext from tb_ext where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->ext->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>
