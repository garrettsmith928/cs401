<?php
require_once('head.php');
require_once('navbar.php');

function gallerySquare($src, $desc)
{
	echo
	'<div class = "ratio2">
		<div class = "ratioContainer" id = "img1">
			<div class = "imageContainer">
				<img class = "imgCrop" src = "images/' . $src . '" />
			</div>
			<div class = "imageTextContainer">
				<div class = "textCenteredOverImage" id = "galleryImageTitle">' . $desc . '</div>
			</div>
		</div>
	</div>';
}

require_once 'Dao.php';
$dao = new Dao();
$menuItems = $dao->getMenuItems();

foreach ($menuItems as $item){
	gallerySquare($item['image'], $item['id'] . '. ' . $item['item']);
}
?>

<hr style = "visibility:hidden;">

<?php
require_once('footer.php');
?>