<?php 
	/**
	 * 
	 */
	class product {
		private $id;
		private $title;
		private $price;
		private $description;
		private $image;
		public $dbConn;

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setTitle($title) { $this->title = $title; }
		function getTitle() { return $this->title; }
		function setPrice($price) { $this->price = $price; }
		function getPrice() { return $this->price; }
		function setDescription($description) { $this->description = $description; }
		function getDescription() { return $this->description; }
		function setImage($image) { $this->image = $image; }
		function getImage() { return $this->image; }

		public function __construct($conn) {
            $this->dbConn = $conn;
        }

		public function getAllProducts() {
			if(!isset($_GET['category'])){
							$per_page=6;
							
							if(isset($_GET['page']))
							{
								$page = $_GET['page'];
							}
								else{
								$page=1;
								$start_form =($page-1) * $per_page;
			$sql  = "SELECT * FROM products order by 1 DESC LIMIT $start_form,$per_page";

			$stmt = $this->dbConn->prepare($sql);
			$stmt->execute();
			$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $products;	
								}
			}
			
			
								
		}

		public function getProductById() {
			$sql  = "SELECT * FROM products WHERE product_id = :pid";
			$stmt = $this->dbConn->prepare($sql);
			$stmt->bindParam('pid', $this->id);
			$stmt->execute();
			$products = $stmt->fetch(PDO::FETCH_ASSOC);
			return $products;	
		}
	}
 ?>