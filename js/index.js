import "../css/style.scss";

/* navbar */
/* navbar resposive hide */
const respNavIndicIcon = document.querySelector(".icon");
const navbar = document.querySelector(".navbar");

/* maybe its better if we use foreach for this but the main logic something like that and it is not closing when you click out of navbar */

respNavIndicIcon.onclick = function toggleNavbar() {
  if (navbar.classList.contains("active")) {
    navbar.classList.toggle("active");
  } else {
    navbar.classList.add("active");
  }
};

// Create variables

const navbarRef = document.querySelectorAll('.list');
const productCardsRef = document.querySelectorAll('.product-card');

let category = '';

// Event listener

navbarRef.forEach((listItem) =>
  listItem.addEventListener("click", (e) => {
    navbarRef.forEach((listItem) => listItem.classList.remove("active"));
    e.currentTarget.classList.add("active");
    navbar.classList.toggle("active");

    // handle categories

    category = e.currentTarget.dataset.category;
    // check if clicking on subcategory
    const parentRef = e.target.parentElement;
    if (parentRef.tagName == 'LI' && !parentRef.classList.contains('list')) {
      category = parentRef.dataset.category;
    }
    hideProducts(category);
    resetFilter();

    // dropdown
    if (e.currentTarget.classList.contains('dropdown')) {
      e.currentTarget.classList.add('open');
      e.currentTarget
        .querySelector('ul')
        .addEventListener('mouseleave', hideDropdown);
    }
  })
);

// Hide products function

function hideProducts(category = '') {
  productCardsRef.forEach((productCard) => {
    // reset hidden class
    productCard.classList.remove("hidden");

    // check if selected category is one of the categories of the product
    if (
      category &&
      !productCard.dataset.category
        .split(',')
        .reduce((acc, cat) => (cat.startsWith(category) ? true : acc), false)
    ) {
      productCard.classList.add('hidden');
    }
  });
}

// Hide dropdown function

function hideDropdown(e) {
  e.currentTarget.parentElement.classList.remove('open');
}

/**
 * Sidebar / Filter
 */

// Sidebar onclick

// Create variables

const sidebarRef = document.querySelector(".sidebar-container");
const productMainRef = document.querySelector(".product-main");
const btnFiltersRef = document.querySelector(".btn-filters");

btnFiltersRef.onclick = function toggleSidebar() {
  if (sidebarRef.classList.contains("active")) {
    sidebarRef.classList.remove("active");
    productMainRef.style.width = "100%";
  } else {
    sidebarRef.classList.add("active");
    productMainRef.style.width = "calc(100% - 150px)";
  }
};

// Filter handler

// Create variables

let color = "";
let price = "";
let brand = "";

const filterOptionsRef = document.querySelectorAll('.filter-option');
const filterOptionsInputRef = document.querySelectorAll('.filter-option input');

// Event listener

filterOptionsRef.forEach((filterOption) =>
  filterOption.addEventListener("change", (e) => {
    // save value of filters
    switch (e.target.name) {
      case "color":
        color = e.target.value;
        break;
      case "price":
        price = e.target.value;
        break;
      case "brand":
        brand = e.target.value;
        break;
      default:
        color = "";
        price = "";
        brand = "";
        break;
    }
    // reset hidden class but keeps category
    hideProducts(category);
    // filter on color, price and brand
    filterProducts(color, price, brand);
    console.log(color, price, brand);
  })
);

// Filter function

function filterProducts(color, price, brand) {
  productCardsRef.forEach((productCard) => {
    // hide products that do not have the filtered color
    if (color) {
      if (productCard.dataset.color !== color) {
        productCard.classList.add("hidden");
      }
    }
    // hide products that do not have the filtered price
    if (price) {
      if (productCard.dataset.price !== price) {
        productCard.classList.add("hidden");
      }
    }
    // hide products that do not have the filtered brand
    if (brand) {
      if (productCard.dataset.brand !== brand) {
        productCard.classList.add("hidden");
      }
    }
  });
}

// Reset filter function

function resetFilter() {
  filterOptionsInputRef.forEach((input) => (input.checked = false));
  color = '';
  price = '';
  brand = '';
}

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
