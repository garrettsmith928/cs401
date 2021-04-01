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
  
  $errors = array();
  
  $boxFill = array();
  $boxFill['email'] = $email;
  $boxFill['name1'] = $name;
  $boxFill['phone'] = $phone;
  $boxFill['street'] = $street;
  $boxFill['city'] = $city;
  $boxFill['state'] = $state;
  $boxFill['zip'] = $zip;
  
  
  
//Create Error ARRAY

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors[] = "Invalid email.";
}


if ($password != $passwordv){
	$errors[] = "Passwords did not match.";
}
 
if (strlen($address) < 8) {
	$address = "";
}

if (count($errors) > 0) {
	$_SESSION['messages'] = $errors;
	$_SESSION['boxFill'] = $boxFill;
	$_SESSION['class'] = "printError";
	header('Location: create_account.php');
	exit;
}

	//Sanitize
	$email = htmlspecialchars($email);
	$email = strtolower($email);
	$name =  htmlspecialchars($name);
	$phone =  htmlspecialchars($phone);
	$address =  htmlspecialchars($address);
	
	$password = hash('sha256', $password . '134b51i35fo12');

	// check the email and password
	require_once 'Dao.php';
	$dao = new Dao();
	$_SESSION['authenticated'] = $dao->createUser($email, $password, $name, $phone, $address);

	if ($_SESSION['authenticated']) {
		header('Location: login.php');
		exit;
	} else {
		$errors[] = "That username is already taken.";
		$_SESSION['messages'] = $errors;
		$_SESSION['boxFill'] = $boxFill;
		$_SESSION['class'] = "printError";
		header('Location: create_account.php');
		exit;
	}