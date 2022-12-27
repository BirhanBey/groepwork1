// navbar onclick
const list = document.querySelectorAll(".list");
function activeLink() {
  list.forEach((item) => item.classList.remove("active"));
  this.classList.add("active");
}
list.forEach((item) => item.addEventListener("click", activeLink));

// sidebar toggle
var sidebar = document.querySelector(".sidebar-container");
var productmain = document.querySelector(".product-main");
var toggleBtn = document.querySelector(".btn-filters");
var closeBtn = document.querySelector(".btn-close");

toggleBtn.onclick = function toggleSidebar() {
  if (sidebar.classList.contains("active")) {
    sidebar.classList.remove("active");
    productmain.style.setProperty("width", "100%");
  } else {
    sidebar.classList.add("active");
    productmain.style.setProperty("width", "calc(100% - 150px)");
  }
};

// image box(these are from w3school you can delete and put your owns, they arehere only for show an example)
function openModal(id) {
  document.getElementById("myModal" + id).style.display = "block";
}

function closeModal(id) {
  document.getElementById("myModal" + id).style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
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
  captionText.innerHTML = dots[slideIndex - 1].alt;
}
