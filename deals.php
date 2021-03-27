<?php
require_once('head.php');
require_once('navbar.php');

echo '<div class = "topSpacer"></div>';
echo '<div class = "dailyDealBackground">';

function dailyDealText($day, $item, $desc)
{
echo
'<div class = "dailyDealContainer">
	<div class = "dailyDealTitle">
		<div class = "textCenteredOverImage">
			<b>' . $day . '</b>
		</div>
	</div>
	<div class = "dailyDealDesc">
		<div class = "dailyDealTitle" id = "dailyDealItem">
			<div class = "textCenteredOverImage">
				<b>' . $item . '</b>
			</div>
		</div>
		<div class = "dailyDealDesc">' . $desc . '</div>
	</div>
</div>';
}

function dailyDealImage($src)
{
echo
'<div class = "dailyDealContainer">
	<img src = "' . $src . '" />
</div>';
}

dailyDealText('Monday', 'Mozeralla Sticks', 'Juicy Delectable Tator Tots<br>smothered in bacon and cheese');
dailyDealImage('images/sticks.jpg');
dailyDealImage('images/sticks.jpg');
dailyDealText('Tuesday', 'Mozeralla Sticks', 'Juicy Delectable Tator Tots<br>smothered in bacon and cheese');
dailyDealText('Wednesday', 'Mozeralla Sticks', 'Juicy Delectable Tator Tots<br>smothered in bacon and cheese');
dailyDealImage('images/sticks.jpg');
dailyDealImage('images/sticks.jpg');
dailyDealText('Thursday', 'Mozeralla Sticks', 'Juicy Delectable Tator Tots<br>smothered in bacon and cheese');
dailyDealText('Friday', 'Mozeralla Sticks', 'Juicy Delectable Tator Tots<br>smothered in bacon and cheese');
dailyDealImage('images/sticks.jpg');
dailyDealImage('images/sticks.jpg');
dailyDealText('Saturday', 'Mozeralla Sticks', 'Juicy Delectable Tator Tots<br>smothered in bacon and cheese');
dailyDealImage('images/sticks.jpg');
dailyDealText('Sunday', 'Mozeralla Sticks', 'Juicy Delectable Tator Tots<br>smothered in bacon and cheese');

echo '</div>';

require_once('footer.php');
?>