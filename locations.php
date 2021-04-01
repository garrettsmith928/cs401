<?php
require_once('head.php');
require_once('navbar.php');

function makeLocation($location, $street, $city, $state, $zip, $phone)
{
echo '
<div class = "locationContainer">
	<div><b>' . $location . '</b></div>
	<br>
	<div>' . $street . '</div>
	<div>' . $city . ', ' . $state . '</div>
	<div>' . $zip . '</div>
	<br>
	<div>' . $phone . '</div>
</div>
';
}

for ($x = 0; $x <= 8; $x++) {
  makeLocation('Boise Location', '1507 S Broadway Ave', 'Boise', 'ID', '83706', '(208) 123-4567');
}


?>

<?php
require_once('footer.php');
?>