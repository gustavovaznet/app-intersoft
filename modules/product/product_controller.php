<?php
	//REQUIRE
	require '../connection/connection.php';
	require "product.service.php";
	require "product.model.php";

	//CHECK ACTION
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//INSERT
	if($action == 'insert'){

		if(empty($_POST['product']) || empty($_POST['model']) || empty($_POST['amount']) || empty($_POST['snumber']) || empty($_POST['anumber']) || empty($_POST['function']) || empty($_POST['company'])){
			header('location: product_manage.php?status=white');
			exit();
		}

		$connection = new Connection();
		$product = new Product();
		$product->__set('product',$_POST['product']);
		$product->__set('model',$_POST['model']);
		$product->__set('amount',$_POST['amount']);
		$product->__set('snumber',$_POST['snumber']);
		$product->__set('anumber',$_POST['anumber']);
		$product->__set('function',$_POST['function']);
		$product->__set('company',$_POST['company']);
		$productService = new ProductService($connection, $product);
		$productService->insert();
		
		if(isset($_GET['action']) && $_GET['action'] == 'insert'){
			header('location: product_manage.php?status=insert_success');
		}else{
			header('location: product_manage.php?status=error');	
		}

	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();
		$product = new Product();
		$productService = new ProductService($connection, $product);
		$products = $productService->recover();

	//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();
		$product = new Product();
		$product->__set('id',$_POST['id']);
		$product->__set('product',$_POST['product']);
		$product->__set('model',$_POST['model']);
		$product->__set('amount',$_POST['amount']);
		$product->__set('snumber',$_POST['snumber']);
		$product->__set('anumber',$_POST['anumber']);
		$product->__set('function',$_POST['function']);
		$product->__set('company',$_POST['company']);
		$productService = new ProductService($connection, $product);
		$productService->update();

		if(isset($_GET['action']) && $_GET['action'] == 'update'){
			header('location: product_manage.php?status=update_success');
		}else{
			header('location: product_manage.php?status=error');
		}

	//DELETE
	}else if($action == 'delete'){

		$connection = new Connection();
		$product = new Product();
		$product->__set('id',$_GET['id']);
		$productService = new ProductService($connection, $product);
		$products = $productService->delete();

		if(isset($_GET['action']) && $_GET['action'] == 'delete'){
			header('location: product_manage.php?status=delete_success');
		}else{
			header('location: product_manage.php?status=error');
		}

	//SEARCH
	} else if($action == 'search') {
		if(empty($_POST['product_search'])){
			header('location: ../../product_search.php?status=white');
			exit;
		}

		$product = new Product();
		$connection = new Connection();
		$productService = new ProductService($connection, $product);
		$products = $productService->search();


	//RECOVER FOR UPDATE
	}else if($action == 'recover_prod_spec'){

		$connection = new Connection();
		$product = new Product();
		$product->__set('id',$_GET['id']);
		$productService = new ProductService($connection, $product);
		$products = $productService->recover_prod_spec();

	}
	
?>
