<?php
	class ProjectService{

		private $connection;
		private $project;
		
		//CONSTRUCT
		public function __construct(Connection $connection, Project $project){
			$this->connection = $connection->connect();
			$this->project = $project;
		}
		
		//INSERT
		public function insert(){
			$query = 'insert into tb_projects(company, project, note)values(:company, :project, :note)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':company',$this->project->__get('company'));
			$stmt->bindValue(':project',$this->project->__get('project'));
			$stmt->bindValue(':note',$this->project->__get('note'));
			$stmt->execute();
		}
		
		//RECOVER
		public function recover(){
			$query =	'select	id, company, project, note from tb_projects';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		
		//UPDATE
		public function update(){
			$query = 'update tb_projects set company = :company, project = :project, note = :note where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':company',$this->project->__get('company'));
			$stmt->bindValue(':project',$this->project->__get('project'));
			$stmt->bindValue(':note',$this->project->__get('note'));
			$stmt->bindValue(':id',$this->project->__get('id'));
			$stmt->execute();
		}

		//DELETE
		public function delete(){
			$query = 'delete from tb_projects where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->project->__get('id'));
			$stmt->execute();
		}

		//SEARCH
		public function search() {
			$project_search = $_POST['project_search'];	
			$query = "select id, company, project, note from tb_projects where company LIKE '%$project_search%' or project LIKE '%$project_search%' or note LIKE '%$project_search%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER FOR UPDATE
		public function recover_for_update(){
			$query = 'select id, company, project, note from tb_projects where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->project->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

	}
	
?>
