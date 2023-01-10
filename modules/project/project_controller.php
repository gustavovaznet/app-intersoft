<?php

	//REQUIRE
	require '../connection/connection.php';
	require "project.service.php";
	require "project.model.php";

	//CHECK ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//INSERT
	if($action == 'insert'){

		if(empty($_POST['company']) || empty($_POST['project']) || empty($_POST['note'])){
			header('location: project_manage.php?status=white');
			exit();
		}

		$connection = new Connection();
		$project = new Project();
		$project->__set('company',$_POST['company']);
		$project->__set('project',$_POST['project']);
		$project->__set('note',$_POST['note']);
		$projectService = new ProjectService($connection, $project);
		$projectService->insert();
		
		if(isset($_GET['action']) && $_GET['action'] == 'insert'){
			header('location: project_manage.php?status=insert_success');
		}else{
			header('location: project_manage.php?status=error');	
		}

	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();
		$project = new Project();
		$projectService = new ProjectService($connection, $project);
		$projects = $projectService->recover();

	//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();
		$project = new Project();
		$project->__set('id',$_POST['id']);
		$project->__set('company',$_POST['company']);
		$project->__set('project',$_POST['project']);
		$project->__set('note',$_POST['note']);
		$projectService = new ProjectService($connection, $project);
		$projectService->update();

		if(isset($_GET['action']) && $_GET['action'] == 'update'){
			header('location: project_manage.php?status=update_success');
		}else{
			header('location: project_manage.php?status=error');
		}

	//DELETE
	}else if($action == 'delete'){

		$connection = new Connection();
		$project = new Project();
		$project->__set('id',$_GET['id']);
		$projectService = new ProjectService($connection, $project); 
		$projects = $projectService->delete();

		if(isset($_GET['action']) && $_GET['action'] == 'delete'){
			header('location: project_manage.php?status=delete_success');
		}else{
			header('location: project_manage.php?status=error');
		}

	//SEARCH
	} else if($action == 'search') {
		
		if(empty($_POST['project_search'])){
			header('location: project_search.php?status=white');
			exit;
		}

		$project = new Project();
		$connection = new Connection();
		$projectService = new ProjectService($connection, $project);
		$projects = $projectService->search();

	//RECOVER FOR UPDATE
	}else if($action == 'recover_for_update'){

		$connection = new Connection();
		$project = new Project();
		$project->__set('id',$_GET['id']);
		$projectService = new ProjectService($connection, $project);
		$projects = $projectService->recover_for_update();

	}
	
?>
