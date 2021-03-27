<?php
  session_start();

  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordv = $_POST['passwordv'];
  $name = $_POST['name1'];
  $phone = $_POST['phone'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $address = $street . ", " . $city . ", " . $state  . ", " . $zip;
  
//Create Error ARRAY

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	//Add error to array
}

if (password != passwordv){
	//Add error to array
}
  
if (strlen($address) < 8) {
  $address = "";
}

//TODO IF ERROR ARRAY IS GREATER THAN 0 LET USER KNOW


  // check the email and password
  require_once 'Dao.php';
  $dao = new Dao();
  $_SESSION['authenticated'] = $dao->createUser($email, $password, $name, $phone, $address);

  if ($_SESSION['authenticated']) {
     header('Location: login.php');
     exit;
  } else { 
     header('Location: create_account.php');
     exit;
  }