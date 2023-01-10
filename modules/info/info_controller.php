<?php

	//REQUIRE
	require '../connection/connection.php';
	require "info.service.php";
	require "info.model.php";

	//CHECK ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//INSERT
	if($action == 'insert'){

		if(empty($_POST['question']) || empty($_POST['answer'])){
			header('location: info_new.php?status=white');
			exit();
		}

		$connection = new Connection();
		$info = new Info();
		$info->__set('question',$_POST['question']);
		$info->__set('answer',$_POST['answer']);
		$infoService = new InfoService($connection, $info);
		$infoService->insert();

		if(isset($_GET['action']) && $_GET['action'] == 'insert'){
			header('location: info_new.php?status=insert_success');
		}else{
			header('location: info_new.php?status=error');
		}

	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();
		$info = new Info();
		$infoService = new InfoService($connection, $info);
		$infos = $infoService->recover();

	//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();
		$info = new Info();
		$info->__set('id',$_POST['id']);
		$info->__set('question',$_POST['question']);
		$info->__set('answer',$_POST['answer']);
		$infoService = new InfoService($connection, $info);
		$infoService->update();

		if(isset($_GET['action']) && $_GET['action'] == 'update'){
			header('location: info_manage.php?status=update_success');
		}else{
			header('location: info_manage.php?status=error');
		}

	//DELETE
	}else if($action == 'delete'){

		$connection = new Connection();
		$info = new Info();
		$info->__set('id',$_GET['id']);
		$infoService = new InfoService($connection, $info); 
		$infos = $infoService->delete();

		if(isset($_GET['action']) && $_GET['action'] == 'delete'){
			header('location: info_manage.php?status=delete_success');
		}else{
			header('location: info_manage.php?status=error');
		}

	//SEARCH
	}else if($action == 'search') {

		if(empty($_POST['info_search'])){
			header('location: ../../info_search.php?status=white');
			exit;
		}

		$info = new Info();
		$connection = new Connection();
		$infoService = new InfoService($connection, $info);
		$infos = $infoService->search();

	//RECOVER FOR UPDATE
	}else if($action == 'recover_for_update'){

		$connection = new Connection();
		$info = new Info();
		$info->__set('id',$_GET['id']);
		$infoService = new InfoService($connection, $info);
		$infos = $infoService->recover_for_update();
	
	}

?>
