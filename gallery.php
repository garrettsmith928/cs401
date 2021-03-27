<?php
require_once('head.php');
require_once('navbar.php');

function gallerySquare($src, $desc)
{
	echo
	'<div class = "ratio2">
		<div class = "ratioContainer" id = "img1">
			<div class = "imageContainer">
				<img class = "imgCrop" src = "' . $src . '" />
			</div>
			<div class = "imageTextContainer">
				<div class = "textCenteredOverImage" id = "galleryImageTitle">' . $desc . '</div>
			</div>
		</div>
	</div>';
}

gallerySquare('images/chickenSandwich.jpg', '12. Chicken Sandwich');
gallerySquare('images/burger.jpg', '6. Super Cheese Burger');
gallerySquare('images/food.jpg', '32. Super Sampler');
gallerySquare('images/shake.jpg', '52. Fancy Milkshake');
gallerySquare('images/sticks.jpg', '2. Gooey Mozzarella Sticks');
gallerySquare('images/fries.jpg', '5. Fruity Mctooty Salad');
gallerySquare('images/shake.jpg', '52. Fancy Milkshake');

require_once('footer.php');
?>