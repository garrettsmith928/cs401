<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$email = $_POST['email'];
$email = htmlspecialchars($email);
$email = strtolower($email);

$password = $_POST['password'];
$password = hash('sha256', $password . '134b51i35fo12');

// check the email and password
require_once 'Dao.php';
$dao = new Dao();
$_SESSION['authenticated'] = $dao->userLogin($email, $password);

if ($_SESSION['authenticated']) {
	$_SESSION['user'] = $dao->getUser($email);
	header('Location: index.php');
	exit;
} else {
	$errors = array();
	$_SESSION['messages'] = $errors;
	$errors[] = "Please verify email and password.";
	header('Location: login.php');
	exit;
}