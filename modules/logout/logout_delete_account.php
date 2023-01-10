<?php
	//LOGOUT DELETE ACCOUNT
	session_start();
	session_destroy();
	header('location: ../../index.php?status=delete_account');
	exit();
?>
