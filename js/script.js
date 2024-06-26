//home page
//image slide show
let slideIndex = 1;
let slideshowTimer;

showSlides(slideIndex);
startSlideshow();

function currentSlide(n) {
  clearTimeout(slideshowTimer);
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  
  startSlideshow();
}

function startSlideshow() {
  clearTimeout(slideshowTimer);
  slideshowTimer = setTimeout(() => {
    slideIndex++;
    showSlides(slideIndex);
  }, 2000); // Change image every 2 seconds
}

