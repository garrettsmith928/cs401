<?php
require_once('head.php');
require_once('navbar.php');

echo '<div class = "topSpacer"></div>';
echo '<div class = "dailyDealBackground">';

function dailyDealText($item)
{
echo
'<div class = "dailyDealContainer">
	<div class = "dailyDealTitle">
		<div class = "textCenteredOverImage">
			<b>' . $item['daysOfWeek'] . '</b>
		</div>
	</div>
	<div class = "dailyDealDesc">
		<div class = "dailyDealTitle" id = "dailyDealItem">
			<div class = "textCenteredOverImage">
				<b>' . $item['title'] . '</b>
			</div>
		</div>
		<div class = "dailyDealDesc" id ="dailyDealText">' . $item['description'] . '</div>
	</div>
</div>';
}

function dailyDealImage($image)
{
echo
'<div class = "dailyDealContainer">
	<div class = "imgContainer">
		<img class = "imgCrop" src = "images/' . $image . '" />
	</div>
</div>';
}

function postDailyDeals($dailyDeals)
{
	date_default_timezone_set('America/Boise');
	$y = date('w');
	//echo "The time is " . date("h:i:sa");
	$item = $dailyDeals[$y];
	for ($x = 0; $x < 7; $x++) {
		$z = $x + $y;
		$item = $dailyDeals[($z - 1) % 7];
		if($x % 2 == 0) {
			dailyDealText($item);
			dailyDealImage($item['image']);
		} else {
			dailyDealImage($item['image']);
			dailyDealText($item);
		}
	}
	

}

require_once 'Dao.php';
$dao = new Dao();
$dailyDeals = $dao->getDailyDeals();

postDailyDeals($dailyDeals);

echo '</div>';

require_once('footer.php');
?>