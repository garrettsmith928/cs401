<?php
  session_start();
  
  if (!(isset($_SESSION['user']))) {
	 header('Location: login.php');
     exit;
  }
  
  $email = $_SESSION['user']['email'];
  $name = "Hidden";
  if ($_POST['displayName'] == "useName") {
	    if (isset($_SESSION['user']['name'])) {
			$name = $_SESSION['user']['name'];
	}
  }
  
  $score = $_POST['score'];
  $review = $_POST['leaveCommentBox'];
  $review = htmlspecialchars($review);

  // check the email and password
  require_once 'Dao.php';
  $dao = new Dao();
  $_SESSION['authenticated'] = $dao->leaveReview($email, $name, $score, $review);

  if ($_SESSION['authenticated']) {
     header('Location: review.php');
     exit;
  } else { 
     header('Location: login.php');
     exit;
  }