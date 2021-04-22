<?php
require_once('head.php');
require_once('navbar.php');
?>

<link rel="stylesheet" href="carouselStyle.css">
<div class = "ratio1">
	<div class = "ratioContainer">
		<!-- Slideshow container -->
		<div class = "imgContainer">
		<b>
		
<?php
$numberOfImages = 0;
function addToCarousel($img, $desc)
{
	echo
	'<div class="mySlides fade">
		<img class = "imgCrop" src="images/' . $img . '" style="width:100%">
		<div class="text">' . $desc . '</div>
	</div>';
}

function createDots()
{
	global $numberOfImages;
	for($i = 1; $i <= $numberOfImages; $i++){
		echo
		'<span class="dot" onclick="currentSlide(' . $i . ')"></span>';
	}
}


require_once 'Dao.php';
$dao = new Dao();
$carouselItems = $dao->getCarouselItems();

foreach ($carouselItems as $item){
	addToCarousel($item['image'], $item['description']);
	global $numberOfImages;
	$numberOfImages++;
}
?>
			<!-- Next and previous buttons -->
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>

			<!-- The dots/circles -->
			<div class="buttonDiv">
				<?php
				createDots();
				?>
			</div>
			</b>
		</div>
	</div>
</div>

<script src="carousel.js"></script>

<?php
require_once('footer.php');
?>