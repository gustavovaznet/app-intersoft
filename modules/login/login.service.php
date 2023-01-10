<?php
	class LoginService{

		private $connection;
		private $login;

		public function __construct(Connection $connection, Login $login){
			$this->connection = $connection->connect();
			$this->login = $login;
		}

		//LOGIN
		public function login(){
			$query = 'select id, name, type from tb_users where mail = :mail and password = md5(:password)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':mail',$this->login->__get('mail'));
			$stmt->bindValue(':password',$this->login->__get('password'));
			$stmt->execute();
			$login = $stmt->fetch(\PDO::FETCH_ASSOC);
			if($login['id'] != '' && $login['name'] != '' && $login['type'] != ''){
				$this->login->__set('id',$login['id']);
				$this->login->__set('name',$login['name']);
				$this->login->__set('type',$login['type']);
			}
			return $this;
		}

		//REGISTER
		public function register(){
			$query = 'insert into tb_users(name, surname, mail, password, type)values(:name, :surname, :mail, md5(:password), :type)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->login->__get('name'));
			$stmt->bindValue(':surname',$this->login->__get('surname'));
			$stmt->bindValue(':mail',$this->login->__get('mail'));
			$stmt->bindValue(':password',$this->login->__get('password'));
			$stmt->bindValue(':type',$this->login->__get('type'));
			$stmt->execute();
		}

		//RECOVER
		public function recover(){
			$query = 'select * from tb_users';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//UPDATE
		public function update(){
			$query = 'update tb_users set name = :name, surname = :surname, mail = :mail, type = :type where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->login->__get('name'));
			$stmt->bindValue(':surname',$this->login->__get('surname'));
			$stmt->bindValue(':mail',$this->login->__get('mail'));
			$stmt->bindValue(':type',$this->login->__get('type'));
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
		}

		//DELETE
		public function delete(){
			$query = 'delete from tb_users where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
		}

		//CHANGE
		public function change(){
			$query = 'update tb_users set password = md5(:password) where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':password',$this->login->__get('password'));
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
		}

		//RECOVER FOR UPDATE
		public function recover_for_change(){
			$query = 'select id, name, password from tb_users where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//SEARCH
		public function search() {
			$login_search = $_POST['login_search'];	
			$query = "select id, name, surname, mail, type from tb_users where name LIKE '%$login_search%' or surname LIKE '%$login_search%' or mail LIKE '%$login_search%' or type LIKE '%$login_search%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER USER
		public function recover_user(){
			$query = 'select id, name, surname, mail, type from tb_users where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER FOR UPDATE
		public function recover_for_update(){
			$query = 'select id, name, surname, mail, type from tb_users where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>
