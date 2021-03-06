<?php 
	/**
	 * 
	 */
	class user {
		private $id;
		private $name;
		private $email;
		private $mobile;
		private $address;
		private $createdOn;
		public $dbConn;

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setEmail($email) { $this->email = $email; }
		function getEmail() { return $this->email; }
		function setMobile($mobile) { $this->mobile = $mobile; }
		function getMobile() { return $this->mobile; }
		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }

		public function __construct($conn) {
			$this->dbConn = $conn;
		}

		public function getUserByEmailId() {
			$sql  = "SELECT * FROM users WHERE email = :email";
			$stmt = $this->dbConn->prepare($sql);
			$stmt->bindParam('email', $this->email);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			return $user;	
		}

		public function getUserById() {
			$sql  = "SELECT * FROM users WHERE id = :id";
			$stmt = $this->dbConn->prepare($sql);
			$stmt->bindParam('id', $this->id);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			return $user;	
		}
	}
 ?>