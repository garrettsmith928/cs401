<?php
require_once('head.php');
require_once('navbar.php');

if (isset($_SESSION['user'])) {
	echo print_r($_SESSION['user']);	
}


$logger = file_get_contents('log.txt');
$loggerLines = explode("\n", $logger);
?>

</br>Logger information:</br></br>

<?php
foreach ($loggerLines as $log){
	echo '' . $log . '</br>';
}

require_once('footer.php');
?>