<?php

require_once 'KLogger.php';

class Dao {

  public $dsn = 'mysql:dbname=webdev;host=127.0.0.1';
  public $user = "root";
  public $password = "password";
  protected $logger;

  public function __construct () {
    $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
  }

  private function getConnection () {
    try {
        $connection = new PDO($this->dsn, $this->user, $this->password);
        $this->logger->LogDebug("Got a connection");
    } catch (PDOException $e) {
        $error = 'Connection failed: ' . $e->getMessage();
        $this->logger->LogError($error);
    }
    return $connection;
  }
  
    public function userExists($email) {
    $connection = $this->getConnection();
    try {
        $q = $connection->prepare("select count(*) as total from users where email = :email");
        $q->bindParam(":email", $email);
        $q->execute();
        $row = $q->fetch();
        if ($row['total'] == 1) {
           $this->logger->LogInfo("user found!" . print_r($row,1));
           return true;
        } else {
		   $this->logger->LogInfo("user not found!");
           return false;
        }
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }

  public function userLogin($email, $password) {
    $connection = $this->getConnection();
    try {
        $q = $connection->prepare("select count(*) as total from users where email = :email and password = :password");
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->execute();
        $row = $q->fetch();
        if ($row['total'] == 1) {
		   $this->logger->LogInfo("test " . print_r($row));
           $this->logger->LogInfo("user found!" . print_r($row,1));
           return true;
        } else {
			$this->logger->LogInfo("user not found!");
           return false;
        }
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }
  
	public function createUser ($email, $password, $name, $phone, $address) {
		/*
			if (userExists($email)){
				return false;
			}
		*/
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
			$this->logger->LogInfo("Status: " . print_r($result));
			return true;
		} catch(Exception $e) {
		  echo print_r($e,1);
		  exit;
		}
	}

  public function deleteComment ($id) {
    $this->logger->LogInfo("deleting comment id [{$id}]");
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  public function insertComment ($name, $comment) {
    $this->logger->LogInfo("inserting a comment name=[{$name}], comment=[{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (name, comment) values (:name, :comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function getComments () {
    $connection = $this->getConnection();
    try {
        $rows = $connection->query("select name, comment_id, comment, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
    return $rows;
  }

}
