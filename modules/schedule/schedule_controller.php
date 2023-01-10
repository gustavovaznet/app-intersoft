<?php
	//REQUIRE
	require '../connection/connection.php';
	require "schedule.service.php";
	require "schedule.model.php";

	//CHECK ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//INSERT
	if($action == 'insert'){

		if(empty($_POST['date']) || empty($_POST['month']) || empty($_POST['company_worker']) || empty($_POST['home_worker'])){
		header('location: schedule_manage.php?status=white');
		exit();
		}

		$connection = new Connection();
		$schedule = new Schedule();
		$schedule->__set('date',$_POST['date']);
		$schedule->__set('month',$_POST['month']);
		$schedule->__set('company_worker',$_POST['company_worker']);
		$schedule->__set('home_worker',$_POST['home_worker']);
		$scheduleService = new ScheduleService($connection, $schedule);
		$scheduleService->insert();

		if(isset($_GET['action']) && $_GET['action'] == 'insert'){
			header('location: schedule_manage.php?status=insert_success');
		}else{
			header('location: schedule_manage.php?status=error');
		}

	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();
		$schedule = new Schedule();
		$scheduleService = new ScheduleService($connection, $schedule);
		$schedules = $scheduleService->recover();

	//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();
		$schedule = new Schedule();
		$schedule->__set('id',$_POST['id']);
		$schedule->__set('date',$_POST['date']);
		$schedule->__set('month',$_POST['month']);
		$schedule->__set('company_worker',$_POST['company_worker']);
		$schedule->__set('home_worker',$_POST['home_worker']);
		$scheduleService = new ScheduleService($connection, $schedule);
		$scheduleService->update();

		if(isset($_GET['action']) && $_GET['action'] == 'update'){
			header('location: schedule_manage.php?status=update_success');
		}else{
			header('location: schedule_manage.php?status=error');	
		}

	//DELETE
	}else if($action == 'delete'){

		$connection = new Connection();
		$schedule = new Schedule();
		$schedule->__set('id',$_GET['id']);
		$scheduleService = new ScheduleService($connection, $schedule); 
		$schedules = $scheduleService->delete();
		
		if(isset($_GET['action']) && $_GET['action'] == 'delete'){
			header('location: schedule_manage.php?status=delete_success');
		}else{
			header('location: schedule_manage.php?status=error');
		}

	} else if($action == 'search') {
		if(empty($_POST['schedule_search'])){
			header('location: ../../schedule_search.php?status=white');
			exit;
		}

		$schedule = new Schedule();
		$connection = new Connection();
		$scheduleService = new ScheduleService($connection, $schedule);
		$schedules = $scheduleService->search();

	//RECOVER FOR UPDATE
	}else if($action == 'recover_for_update'){

		$connection = new Connection();
		$schedule = new Schedule();
		$schedule->__set('id',$_GET['id']);
		$scheduleService = new ScheduleService($connection, $schedule);
		$schedules = $scheduleService->recover_for_update();

	}

?>
