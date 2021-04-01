<?php
require_once('head.php');
require_once('navbar.php');
?>

<div class = "orderContainer">
	<div class = "menuDivContainer">

<?php
function menuItem($id, $name, $description, $price)
{
echo '
<div class="menuDiv">
	<div id="menuNumber">
		<div class = "menuTextCenter">'. $id . '</div>
	</div>
	<div id="menuName"><b>' . $name . '</b></div>
	<div id="menuDesc">' . $description . '</div>
	<div id="menuPrice">
		<div class = "menuTextCenter">' . $price . '</div>
	</div>
	
	<div id="menuAddToCart">
		<div class = "menuAddToCartButton">
			<div class = "menuTextCenter"><b>+</b></div>
		</div>
		<div class = "menuAddToCartButton" id = "menuAddToCartNumber">
			<div class = "menuTextCenter">0</div>
		</div>
		<div class = "menuAddToCartButton">
			<div class = "menuTextCenter">-</div>
		</div>
		<div class = "menuAddToCartButton">
			<div class = "menuTextCenter">&#62;</div>
		</div>
	</div>
</div>
';
}

require_once 'Dao.php';
$dao = new Dao();
$menuItems = $dao->getMenuItems();

foreach ($menuItems as $item){
	menuItem($item['id'], $item['item'], $item['description'], $item['price']);
}
?>

	</div>
	<div class= "cartDiv">Your Items
	</div>

</div>

<?php
require_once('footer.php');
?>