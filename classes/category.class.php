<?php 
	/**
	 * 
	 */
	class category {
		private $id;
		private $title;
		private $description;
		public $dbConn;

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setTitle($title) { $this->title = $title; }
		function getTitle() { return $this->title; }
		function setDescription($description) { $this->description = $description; }
		function getDescription() { return $this->description; }

		public function __construct($conn) {
			$this->dbConn = $conn;
		}

		public function getAllProductsCategory() {
			$sql  = "SELECT * FROM products_categories";
			$stmt = $this->dbConn->prepare($sql);
			$stmt->execute();
			$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $products;
		}

		public function getCategoryById() {
			$sql  = "SELECT * FROM products_categories WHERE product_category_id = :pcid";
			$stmt = $this->dbConn->prepare($sql);
			$stmt->bindParam('pcid', $this->id);
			$stmt->execute();
			$users = $stmt->fetch(PDO::FETCH_ASSOC);
			return $users;	
		}
	}
 ?>