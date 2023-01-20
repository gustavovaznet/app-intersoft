<?php
	class ProductService{

		private $connection;
		private $product;
		
		//CONSTRUCT
		public function __construct(Connection $connection, Product $product){
			$this->connection = $connection->connect();
			$this->product = $product;
		}
		
		//INSERT
		public function insert(){
			$query = 'insert into tb_products(product, model, amount, snumber, anumber, function, company)values(:product, :model, :amount, :snumber, :anumber, :function, :company)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':product',$this->product->__get('product'));
			$stmt->bindValue(':model',$this->product->__get('model'));
			$stmt->bindValue(':amount',$this->product->__get('amount'));
			$stmt->bindValue(':snumber',$this->product->__get('snumber'));
			$stmt->bindValue(':anumber',$this->product->__get('anumber'));
			$stmt->bindValue(':function',$this->product->__get('function'));
			$stmt->bindValue(':company',$this->product->__get('company'));
			$stmt->execute();
		}
		
		//RECOVER
		public function recover(){
			$query = 'select id, product, model, amount, snumber, anumber, function, company from tb_products';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//UPDATE
		public function update(){
			$query = 'update tb_products set product = :product, model = :model, amount = :amount, snumber = :snumber, anumber = :anumber, function = :function, company = :company where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':product',$this->product->__get('product'));
			$stmt->bindValue(':model',$this->product->__get('model'));
			$stmt->bindValue(':amount',$this->product->__get('amount'));
			$stmt->bindValue(':snumber',$this->product->__get('snumber'));
			$stmt->bindValue(':anumber',$this->product->__get('anumber'));
			$stmt->bindValue(':function',$this->product->__get('function'));
			$stmt->bindValue(':company',$this->product->__get('company'));
			$stmt->bindValue(':id',$this->product->__get('id'));
			$stmt->execute();
		}
		
		//DELETE
		public function delete(){
			$query = 'delete from tb_products where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->product->__get('id'));
			$stmt->execute();
		}

		//SEARCH
		public function search() {
			$product_search = $_POST['product_search'];	
			$query = "select id, product, model, amount, snumber, anumber, function, company from tb_products where product LIKE '%$product_search%' or model LIKE '%$product_search%' or amount LIKE '%$product_search%' or snumber LIKE '%$product_search%' or anumber LIKE '%$product_search%' or function LIKE '%$product_search%' or company LIKE '%$product_search%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//RECOVER FOR UPDATE
		public function recover_prod_spec(){
			$query = 'select id, product, model, amount, snumber, anumber, function, company from tb_products where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->product->__get('id'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}
?>
