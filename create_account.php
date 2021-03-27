<?php
require_once('head.php');
require_once('navbar.php');
?>

<html>
	<head>
	</head>
	<body>
		<br/>
		<div>
			<h1 id = "center_text">Create your account</h1>
			<p id = "center_text">Only boxes with * are required</p>
		</div>
		<br/>
		<form method="post" action="create_account_handler.php">
		<div class="input_box">
			<label for="email">Email*</label>
			<input type="text" id="email" name="email">
		</div>
		<div class="input_box">
			<label for="passwordv">Password*</label>
			<input type="password" id="passwordv" name="passwordv">
		</div>
		<div class="input_box">
			<label for="password">Verify Password*</label>
			<input type="password" id="password" name="password">
		</div>
		<div class="input_box">
			<label for="name1">Full Name</label>
			<input type="text" id="name1" name="name1">
		</div>
		<div class="input_box">
			<label for="phone">Phone Number</label>
			<input type="text" id="phone" name="phone">
		</div>
		<div class="input_box">
			<label for="street">Street</label>
			<input type="text" id="street" name="street">
		</div>
		<div class="input_box">
			<label for="city">City</label>
			<input type="text" id="city" name="city">
		</div>
		<div class="input_box">
			<label for="state">State</label>
			<input type="text" id="state" name="state">
		</div>
		<div class="input_box">
			<label for="zip">Zip</label>
			<input type="text" id="zip" name="zip">
		</div>
		<div class="input_box" id = "submit_div">
			<input id = "submit" type="submit" value="Create Account">
		</div>
		</form>
	</body>
</html>

<?php
require_once('footer.php');
?>