<?php
require_once('head.php');
require_once('navbar.php');

function insertSquare($src, $item, $link)
{
echo
'<div class = "imageContainerMenu">
	<img class = "imgCrop" src = "' . $src . '" />
	<div class = "textCenteredOverImage">
		<a id="menuLink" href = "' . $link . '">' . $item . '</a>
	</div>
</div>';
}

echo '
<div class = "ratio1">
	<div class = "ratioContainer"><b>';
		insertSquare('images/sticks.jpg','Appetizers', 'order.php');
		insertSquare('images/burger.jpg','Entrees', 'order.php');
		echo '
		<div id = "viewFullMenu">
			<img class = "imgCrop" src = "images/wood.jpg" />
			<div class = "textCenteredOverImage" id = "viewFullMenuText">
			<a id="menuLink" href = "order.php">View Full Menu</a></div>
		</div>';
		
		insertSquare('images/fries.jpg','Sides', 'order.php');
		insertSquare('images/shake.jpg','Desserts', 'order.php');
echo '
	</b>
	</div>
</div>';

require_once('footer.php');
?>