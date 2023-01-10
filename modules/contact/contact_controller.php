<?php

	//REQUIRE
	require '../connection/connection.php';
	require "contact.service.php";
	require "contact.model.php";

	//CHECK ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//INSERT
	if($action == 'insert'){
		
		if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['mail'])){
			header('location: contact_manage.php?status=white');
			exit();
		}

		$connection = new Connection();
		$contact = new Contact();
		$contact->__set('name',$_POST['name']);
		$contact->__set('phone',$_POST['phone']);
		$contact->__set('mail',$_POST['mail']);
		$contactService = new ContactService($connection, $contact);
		$contactService->insert();

		if(isset($_GET['action']) && $_GET['action'] == 'insert'){
			header('location: contact_manage.php?status=insert_success');
		}else{
			header('location: contact_manage.php?status=error');	
		}

	//RECOVER
	}else if($action == 'recover'){
		$connection = new Connection();
		$contact = new Contact();
		$contactService = new ContactService($connection, $contact);
		$contacts = $contactService->recover();

	//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();
		$contact = new Contact();
		$contact->__set('id',$_POST['id']);
		$contact->__set('name',$_POST['name']);
		$contact->__set('phone',$_POST['phone']);
		$contact->__set('mail',$_POST['mail']);
		$contactService = new ContactService($connection, $contact);
		$contactService->update();

		if(isset($_GET['action']) && $_GET['action'] == 'update'){
			header('location: contact_manage.php?status=update_success');
		}else{
			header('location: contact_manage.php?status=error');	
		}

	//DELETE
	}else if($action == 'delete'){

		$connection = new Connection();
		$contact = new Contact();
		$contact->__set('id',$_GET['id']);
		$contactService = new ContactService($connection, $contact); 
		$contacts = $contactService->delete();

		if(isset($_GET['action']) && $_GET['action'] == 'delete'){
			header('location: contact_manage.php?status=delete_success');
		}else{
			header('location: contact_manage.php?status=error');	
		}
	
	//SEARCH
	} else if($action == 'search') {
		if(empty($_POST['contact_search'])){
			header('location: ../../contact_search.php?status=white');
			exit;
		}	

		$contact = new Contact();
		$connection = new Connection();
		$contactService = new ContactService($connection, $contact);
		$contacts = $contactService->search();

	//RECOVER FOR UPDATE
	}else if($action == 'recover_for_update'){

		$connection = new Connection();
		$contact = new Contact();
		$contact->__set('id',$_GET['id']);
		$contactService = new ContactService($connection, $contact);
		$contacts = $contactService->recover_for_update();

	}
	
?>
