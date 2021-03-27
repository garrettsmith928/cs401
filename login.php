<?php
require_once('head.php');
require_once('navbar.php');
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