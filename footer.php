	</div>	
	<footer>
		<a href="locations.php">
		<div class = "footerItem">
			<div id = "footerText">Contact Us</div>
		</div>
		</a>
		<a href="terms.php">
		<div class = "footerItem">
			<div id = "footerText">Terms and Conditions</div>
		</div>
		</a>
	</footer>
</body>

<script>
var x = document.URL.lastIndexOf("/");
var currentURL = document.URL.substring(x+1, document.URL.length);
currentURL = currentURL.trim();
document.querySelectorAll('a[href="' + currentURL + '"]').forEach(function(element) {
  element.style.color = '#fff';
});
</script>