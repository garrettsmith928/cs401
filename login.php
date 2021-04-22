<?php
require_once('head.php');
require_once('navbar.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="fade.js"></script>

<?php
if (isset($_SESSION['messages'])) {
  foreach ($_SESSION['messages'] as $message) {
	echo "<div class= '" . $_SESSION['class'] . "' >{$message}</div>";
  }
  unset($_SESSION['messages']);
}
?>

<html>
	<head>
	</head>
	<body>
		<br/>
		<form method="post" action="login_handler.php">
		<div class="input_box">
			<label for="email">Email</label>
			<input type="text" id="email" name="email">
		</div>
		<div class="input_box">
			<label for="password">Password</label>
			<input type="password" id="password" name="password">
		</div >
		<div class="input_box" id = "submit_div">
			<input id = "submit" type="submit" value="Login">
		</div>
		</form>
		<br/>
		<div class="input_box" id = "submit_div">
			<a id = "create_account" href="create_account.php">Create Account</a>
		</div>
	</body>
</html>

<?php
require_once('footer.php');
?>