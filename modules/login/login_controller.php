<?php
	//SESSION START
	session_start();

	//REQUIRE
	require '../connection/connection.php';
	require 'login.model.php';
	require 'login.service.php';

	//CHECK ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//LOGIN
	if($action == 'login'){

		if(empty($_POST['mail']) || empty($_POST['password'])){
			header('location: ../../index.php?status=white');
			exit();
		}

		$connection = new Connection();
		$login = new Login();
		$login->__set('mail',$_POST['mail']);
		$login->__set('password',$_POST['password']);
		$loginService = new LoginService($connection, $login);
		$loginService->login();

		if($login->__get('id') != '' && $login->__get('name') != '' && $login->__get('type') != ''){
			$_SESSION['user'] = [$login->__get('id'),$login->__get('name'),$login->__get('type')];		
			header('location: ../../main.php');
		}else{
			header('location: ../../index.php?status=error');
		}

	//REGISTER
	}else if($action == 'register'){

		if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['mail']) || empty($_POST['password']) || empty($_POST['password_check'])){
			header('location: login_new.php?status=white');
			exit();
		}

		if($_POST['password'] != $_POST['password_check']){
			header('location: login_new.php?status=password');
			exit();
		}

		$connection = new Connection();
		$login = new Login();
		$login->__set('name',$_POST['name']);
		$login->__set('surname',$_POST['surname']);
		$login->__set('mail',$_POST['mail']);
		$login->__set('password',$_POST['password']);
		$login->__set('type',$_POST['type']);
		$loginService = new LoginService($connection, $login);
		$loginService->register();

		if(isset($_GET['action']) && $_GET['action'] == 'register'){
			header('location: login_new.php?status=insert_success');
		}else{
			header('location: login_new.php?status=error');
		}

	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();
		$login = new Login();
		$loginService = new LoginService($connection, $login);
		$logins = $loginService->recover();

	//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();
		$login = new Login();
		$login->__set('id',$_POST['id']);
		$login->__set('name',$_POST['name']);
		$login->__set('surname',$_POST['surname']);
		$login->__set('mail',$_POST['mail']);
		$login->__set('type',$_POST['type']);
		$loginService = new LoginService($connection, $login); 
		$loginService->update();

		if(isset($_GET['action']) && $_GET['action'] == 'update'){
			header('location: login_manage_user.php?status=update_success');
		}else{
			header('location: login_manage.php?status=error');
		}

	//DELETE
	}else if($action == 'delete'){
		
		$connection = new Connection();
		$login = new Login();
		$login->__set('id',$_GET['id']);
		$loginService = new LoginService($connection, $login);
		$logins = $loginService->delete();
			
		if(isset($_GET['action']) && $_GET['action'] == 'delete'){
			header('location: login_manage.php?status=delete_success');
		}else{
			header('location: login_manage.php?status=error');
		}
	
	//DELETE USER
	}else if($action == 'delete_user'){
		
		$connection = new Connection();
		$login = new Login();
		$login->__set('id',$_GET['id']);
		$loginService = new LoginService($connection, $login);
		$logins = $loginService->delete();
			
		if(isset($_GET['action']) && $_GET['action'] == 'delete_user'){
			header('location: ../logout/logout_delete_account.php');
		}else{
			header('location: login_manage_user.php?status=error');
		}

	//CHANGE
	}else if($action == 'change'){
		
		if(empty($_POST['password']) || empty($_POST['check_password'])){
			header('location: ../settings/settings_show.php?status=white');
			exit();
		}

		if($_POST['password'] != $_POST['check_password']){
			header('location: ../settings/settings_show.php?status=check_password');
			exit();
		}

		$connection = new Connection();
		$login = new Login();
		$login->__set('id',$_SESSION['user'][0]);
		$login->__set('password',$_POST['password']);
		$loginService = new LoginService($connection, $login);
		$loginService->change();

		if(isset($_GET['action']) && $_GET['action'] == 'change'){
			header('location: ../settings/settings_show.php?status=password_success');
		}else{
			header('location: ../settings/settings_show.php?status=error');
		}

	//CHANGE USER
	}else if($action == 'change_user'){
		
		if(empty($_POST['password']) || empty($_POST['check_password'])){
			header('location: login_manage.php?status=white');
			exit();
		}

		if($_POST['password'] != $_POST['check_password']){
			header('location: login_manage.php?status=check_password');
			exit();
		}

		$connection = new Connection();
		$login = new Login();
		$login->__set('id',$_POST['id']);
		$login->__set('password',$_POST['password']);
		$loginService = new LoginService($connection, $login);
		$loginService->change();

		if(isset($_GET['action']) && $_GET['action'] == 'change_user'){
			header('location: login_manage.php?status=password_success');
		}else{
			header('location: login_manage.php?status=error');
		}

	//SEARCH
	} else if($action == 'search') {

		if(empty($_POST['login_search'])){
			header('location: login_manage.php?status=white');
			exit;
		}

		$login = new Login();
		$connection = new Connection();
		$loginService = new LoginService($connection, $login);
		$logins = $loginService->search();

	//RECOVER USER
	}else if($action == 'recover_user'){

		$connection = new Connection();
		$login = new Login();
		$login->__set('id',$_SESSION['user'][0]);
		$loginService = new LoginService($connection, $login);
		$logins = $loginService->recover_user();

	//RECOVER FOR UPDATE
	}else if($action == 'recover_for_update'){

		$connection = new Connection();
		$login = new Login();
		$login->__set('id',$_GET['id']);
		$loginService = new LoginService($connection, $login);
		$logins = $loginService->recover_for_update();

	}

?>
