<?php
	//REQUIRE
	require '../connection/connection.php';
	require "ext.service.php";
	require "ext.model.php";

	//CHECK ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//INSERT
	if($action == 'insert'){

		if(empty($_POST['name']) || empty($_POST['department']) || empty($_POST['ext'])){
			header('location: ext_manage.php?status=white');
			exit();
		}

		$connection = new Connection();
		$ext = new Ext();
		$ext->__set('name',$_POST['name']);
		$ext->__set('department',$_POST['department']);
		$ext->__set('ext',$_POST['ext']);
		$extService = new ExtService($connection, $ext);
		$extService->insert();
		
		if(isset($_GET['action']) && $_GET['action'] == 'insert'){
			header('location: ext_manage.php?status=insert_success');
		}else{
			header('location: ext_manage.php?status=error');	
		}

	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();
		$ext = new Ext();
		$extService = new ExtService($connection, $ext);
		$exts = $extService->recover();

	//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();
		$ext = new Ext();
		$ext->__set('id',$_POST['id']);
		$ext->__set('name',$_POST['name']);
		$ext->__set('department',$_POST['department']);
		$ext->__set('ext',$_POST['ext']);
		$extService = new ExtService($connection, $ext);
		$extService->update();

		if(isset($_GET['action']) && $_GET['action'] == 'update'){
			header('location: ext_manage.php?status=update_success');
		}else{
			header('location: ext_manage.php?status=error');	
		}

	//DELETE
	}else if($action == 'delete'){

		$connection = new Connection();
		$ext = new Ext();
		$ext->__set('id',$_GET['id']);
		$extService = new ExtService($connection, $ext); 
		$exts = $extService->delete();

		if(isset($_GET['action']) && $_GET['action'] == 'delete'){
			header('location: ext_manage.php?status=delete_success');
		}else{
			header('location: ext_manage.php?status=error');	
		}

	//SEARCH
	} else if($action == 'search') {
		if(empty($_POST['ext_search'])){
			header('location: ../../ext_search.php?status=white');
			exit;
		}

		$ext = new Ext();
		$connection = new Connection();
		$extService = new ExtService($connection, $ext);
		$exts = $extService->search();

	

	//RECOVER FOR UPDATE
	}else if($action == 'recover_for_update'){

		$connection = new Connection();
		$ext = new Ext();
		$ext->__set('id',$_GET['id']);
		$extService = new ExtService($connection, $ext);
		$exts = $extService->recover_for_update();

	}
	
?>
