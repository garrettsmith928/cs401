var slideIndex = 0;
var slideShowContinue = true;

slideShow(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
  window.slideShowContinue = false;
}

// Next/previous controls
function autoSlide(n) {
  showSlides(slideIndex += 1);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
  window.slideShowContinue = false;
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function slideShow(slideIndex){
	if(window.slideShowContinue){
		autoSlide(slideIndex);
		setTimeout(function(){ slideShow(slideIndex + 1); }, 4000);
	}
}