<?php
session_start();
require_once('head.php');
require_once('navbar.php');
?>
<?php
if (isset($_SESSION['messages'])) {
  
  foreach ($_SESSION['messages'] as $message) {
	echo "<div class= '" . $_SESSION['class'] . "' >{$message}</div>";
  }
  unset($_SESSION['messages']);
}

function fillBox($var)
{
	if (isset($_SESSION['boxFill'][$var])){
		return $_SESSION['boxFill'][$var];
	}
}

function createInputBox($title, $name, $type){
echo '

<div class="input_box">
		<label for="' . $name . '">' . $title . '</label>
		<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . fillBox($name) . '">
</div>';
}
?>


<br/>
<div>
	<h1 id = "center_text">Create your account</h1>
	<p id = "center_text">Only boxes with * are required</p>
</div>
<br/>
<form method="post" action="create_account_handler.php">

<?php
createInputBox('Email*', 'email', 'text');
createInputBox('Password*', 'password', 'password');
createInputBox('Verify Password*', 'passwordv', 'password');
createInputBox('Full Name', 'name1', 'text');
createInputBox('Phone Number', 'phone', 'text');
createInputBox('Street', 'street', 'text');
createInputBox('City', 'city', 'text');
createInputBox('State', 'state', 'text');
createInputBox('Zip', 'zip', 'text');
?>

<div class="input_box" id = "submit_div">
	<input id = "submit" type="submit" value="Create Account">
</div>
</form>

<?php
if (isset($_SESSION['boxFill'])) {
  unset($_SESSION['boxFill']);
}

require_once('footer.php');
?>