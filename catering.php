<?php
require_once('head.php');
require_once('navbar.php');
?>

<div class = "float:left;height:100%;width:100%;">
	<div class = "pageSplit">
		<div id = "cateringTextBox">
			<h4>Catering Options</h4>
			<a href="locations.php">
			<div class = "cateringOrderButton">
				<div class = "textCenteredOverImage" id = "cateringButtonText">Order Delivery</div>
			</div>
			<div class = "cateringOrderButton">
				<div class = "textCenteredOverImage" id = "cateringButtonText">Order Takeout</div>
			</div>
			</a>
			<hr>
			<div id = "cateringParagraph">
				<p>Catering is available with 24 hour notice</p>
				<p>Delivery is available within 25 miles with no extra charge</p>
				<p>Follow the links above or call (208) 123-4567</p>
			</div>
		</div>
	</div>

	<div class = "pageSplit" id = "parentHeight">
		<img class = "imgCrop" src = "images/catering.jpg" />
	</div>
</div>

<?php
require_once('footer.php');
?>