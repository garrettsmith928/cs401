<?php

require_once 'KLogger.php';

class Dao {	

	public $dsn = 'mysql:dbname=heroku_3804133a867b7ac;host=us-cdbr-east-03.cleardb.com';
	public $user = "b4f8adf56f5208";
	public $password = "4a447c2c";
	
	/*
	public $dsn = 'mysql:dbname=webdev;host=127.0.0.1';
	public $user = "root";
	public $password = "password";
	*/

	protected $logger;

	//Create the logger
	public function __construct () {
		$this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
	}

	//Connects to the database
	private function getConnection () {
		//$this->logger->LogDebug(gethostname());
		if (gethostname() == "Garrett") {
			$dsn = 'mysql:dbname=webdev;host=127.0.0.1';
			$user = "root";
			$password = "password";
		} else {
			$dsn = 'mysql:dbname=heroku_3804133a867b7ac;host=us-cdbr-east-03.cleardb.com';
			$user = "b4f8adf56f5208";
			$password = "4a447c2c";
		}
		try {
			$connection = new PDO($this->dsn, $this->user, $this->password);
			//$this->logger->LogDebug("Got a connection");
		} catch (PDOException $e) {
			$error = 'Connection failed: ' . $e->getMessage();
			$this->logger->LogError($error);
		}
		
		return $connection;
	}

	//Returns the the users data, minus the password, to the session.
	public function getUser($email) {
		$connection = $this->getConnection();
		$this->logger->LogInfo("Finding user information for email " . $email);
		try {
			$data = [
				"email" => $email
			];
			$sqlString = ("SELECT email, name, phone, address FROM users WHERE email = '" . $email . "'");
			$user = $connection->query($sqlString)->fetchAll();
			if ($user[0]['email'] == $email) {
				$this->logger->LogInfo("Getting user: " . $user[0]['name']);
				return $user[0];
			} else {
				$this->logger->LogError($error);
			   $this->logger->LogInfo("user not found!");
			   return false;
			}
		} catch(Exception $e) {
		  echo print_r($e,1);
		  exit;
		}
	}	

	//Used to log user in, returns true if login is succesful.
	public function userLogin($email, $password) {
		$connection = $this->getConnection();
		try {
			$q = $connection->prepare("select count(*) as total from users where email = :email and password = :password");
			$q->bindParam(":email", $email);
			$q->bindParam(":password", $password);
			$q->execute();
			$row = $q->fetch();
			if ($row['total'] == 1) {
			   $this->logger->LogInfo("user found for " . $email);
			   return true;
			} else {
				$this->logger->LogInfo("user not found!");
			   return false;
			}
		} catch(Exception $e) {
			$this->logger->LogInfo("Grab User error: " . print_r($e,1));
			  echo print_r($e,1);
			  exit;
		}
	}

	//Adds the new user to the database
	public function createUser ($email, $password, $name, $phone, $address) {
		$connection = $this->getConnection();
		$this->logger->LogInfo("email: " . $email);
		$this->logger->LogInfo("password: " . $password);
		$this->logger->LogInfo("name: " . $name);
		$this->logger->LogInfo("phone: " . $phone);
		$this->logger->LogInfo("address: " . $address);
		try {
			$data = [
				'email' => $email,
				'password' => $password,
				'name' => $name,
				'phone' => $phone,
				'address' => $address
			];
			$sql = "INSERT INTO users (email, password, name, phone, address) VALUES (:email, :password, :name, :phone, :address)";
			$q= $connection->prepare($sql);
			$q->execute($data);
			$result = $q->fetch();
			$this->logger->LogInfo("CREATE USER TRUE STATUS: " . print_r($result));
			return true;
		} catch(Exception $e) {
		  $this->logger->LogInfo("CREATE USER CATCH STATUS: " . print_r($result));
		  $this->logger->LogInfo("Database error: " . print_r($e,1));
		  //echo print_r($e,1);
		  return false;
		}
	}
	
	//Retrives all menu items.
	public function getMenuItems () {
		$connection = $this->getConnection();
		$this->logger->LogInfo("Grabbing menu items...");
		try {
			$data = $connection->query("SELECT id, item, description, image, price FROM menu")->fetchAll();
			//$this->logger->LogInfo("Menu Items: " . print_r($data));
			return $data;
		} catch(Exception $e) {
			$this->logger->LogInfo("CREATE USER TRUE STATUS: " . print_r($e,1));
			echo print_r($e,1);
			exit;
		}
	}
	
	//Retrieves all reviews, sorts by date.
	public function getReviews () {
		$connection = $this->getConnection();
		$this->logger->LogInfo("Grabbing reviews...");
		try {
			$data = $connection->query("SELECT * FROM reviews ORDER BY review_date desc")->fetchAll();
			return $data;
		} catch(Exception $e) {
			$this->logger->LogInfo("REVIEW DATABASE ERROR STATUS: " . print_r($e,1));
			echo print_r($e,1);
			exit;
		}
	}
	
	//Adds the review to the database. User can leave name hidden
	public function leaveReview ($email, $name, $score, $review) {
		$connection = $this->getConnection();
		$this->logger->LogInfo("email: " . $email);
		$this->logger->LogInfo("name: " . $name);
		$this->logger->LogInfo("score: " . $score);
		$this->logger->LogInfo("review: " . $review);
		
		try {
			$data = [
				'email' => $email,
				'name' => $name,
				'score' => $score,
				'review' => $review
			];
			$sql = "INSERT INTO reviews (email, name, score, review, review_date) VALUES (:email, :name, :score, :review, now())";
			$q= $connection->prepare($sql);
			$q->execute($data);
			$result = $q->fetch();
			$this->logger->LogInfo("Status: " . print_r($result));
			return true;
		} catch(Exception $e) {
			$this->logger->LogInfo("Status: " . print_r($e,1));
		  echo print_r($e,1);
		  exit;
		}
	}
}