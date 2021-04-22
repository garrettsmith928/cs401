<?php
session_start();
?>

<body>
	<div id = "loginStatus">
	<?php
		if (isset($_SESSION['user'])) {
			if (isset($_SESSION['user']['name']) and ($_SESSION['user']['name']) != ""){
				echo '<p>Signed in as ' . $_SESSION['user']['name'] . '</p>';
			} else {
				echo '<p>Signed in as ' . $_SESSION['user']['email'] . '</p>';
			}
		} 
	?>
	</div>
	<nav>
		<div class = "bar" id = "topBar">
		<ul>
			<a href="index.php"><img id = "icon" src = "images/icon.png" /></a>
			<?php
			if (!isset($_SESSION['user'])) {
				echo '
				<li id = "login">
				<a href="login.php">Login</a>
				</li>';
			} else {
				echo '
				<li id = "logout">
				<a href="logout.php">Logout</a>
				</li>';
			}
			?>
			<li>
			<a href="locations.php">Locations</a>
			</li>
			<li>
			<a href="order.php">Order Online</a>
			</li>
			<li id="test">
				<a href="index.php">Restaurant's</a>
			</li>
		</ul>
		</div>
		<div class = "bar" id = "botBar">
		<ul>
			<li>
			<a href="menu.php">Menu</a>
			</li>
			<li>
			<a href="gallery.php">Gallery</a>
			</li>
			<li>
			<a href="catering.php">Catering</a>
			</li>
			<li>
			<a href="deals.php">Daily Deals</a>
			</li>
			<li>
			<a href="review.php">Review</a>
			</li>
			<li>
			<a href="debug.php">Debug</a>
			</li>
		</ul>
		</div>
	</nav>
	<div class = "pageBody">