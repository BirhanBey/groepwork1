import '../css/admin.scss';

/**
 * Navbar
 */

// Variables

let menuToggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let table = document.querySelector('.product-table');
const list = document.querySelectorAll('.list');

// Event listener

// toggle navbar
menuToggle.onclick = function () {
  menuToggle.classList.toggle('active');
  navigation.classList.toggle('active');
  table.classList.toggle('active');
};

// active link navbar
list.forEach((item) => item.addEventListener('click', activeLink));

// Active Link function

function activeLink() {
  list.forEach((item) => item.classList.remove('active'));
  this.classList.add('active');
}

/**
 * Add product window
 */

// Display

// Variables

let closebtn = document.querySelector('.close-addnew');
let addWindow = document.querySelector('.new-item');
let newitembtn = document.querySelector('.add-item-page');

// Event listener

closebtn.onclick = function () {
  addWindow.style.display = 'none';
};
newitembtn.onclick = function () {
  addWindow.style.display = 'flex';
};
addWindow.onclick = function (event) {
  if (event.target == addWindow) {
    addWindow.style.display = 'none';
  }
};

/**
 * Add product window focus
 */

// TODO add new item focus-- this should move when you click each input but ony first one is working Ihope you can fix it or we can just delete it

// Variables

let input = document.querySelector('.info input');
let info = document.querySelector('.info');

// Event listener

input.onclick = function () {
  info.classList.toggle('active');
};

// input.onclick = function () {
//   info.forEach((e) => e.classList.toggle("active"));
// };

/**
 * Add product Form
 */

// Variables

const form = document.querySelector('.new-item .form');
const formElementsList = [...form.elements];

// Event listener

form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (validateForm(formElementsList)) {
    form.submit();
  }
});

// Functions

function validateInput(input, message) {
  //check if input is empty
  if (input.value.trim() === '') {
    // TODO: error class with different border color
    return false;
  }
  // TODO: other checks. Make sure the data is correct
  return true;
}

function validateSelect(select, message) {
  //check if input is empty
  if (select.selectedOptions[0].value === '') {
    // TODO: error class with different border color
    return false;
  }
  // TODO: other checks. Make sure the data is correct
  return true;
}

function validateForm(validationArr) {
  return validationArr.reduce((acc, el) => {
    if (el.nodeName === 'INPUT') {
      // checks every input and validate it or not
      if (!validateInput(el, `please fill in the ${el.id} field`)) {
        return false;
      } else {
        return acc;
      }
    } else if (el.nodeName === 'SELECT') {
      if (!validateSelect(el, `please fill in the ${el.id} field`)) {
        return false;
      } else {
        return acc;
      }
    } else {
      return acc;
    }
  }, true);
}

/**
 * Edit product window
 */

// Variables

let closeEditBtn = document.querySelector('.close-edit');
let editWindow = document.querySelector('.edit-item');
let edititembtn = document.querySelector('.editBtn');

// Event listener

closeEditBtn.onclick = function () {
  editWindow.style.display = 'none';
};
edititembtn.onclick = function () {
  editWindow.style.display = 'flex';
};
editWindow.onclick = function (event) {
  if (event.target == editWindow) {
    editWindow.style.display = 'none';
  }
};

/**
 * Delete
 */

// Variables

const deleteBtnRef = document.querySelector('.product__delete');
const deleteBoxRef = document.getElementById('delete-box');

// Event listener

deleteBtnRef.addEventListener(
  'click',
  () => (deleteBoxRef.style.display = 'block')
);

window.onclick = function (event) {
  if (event.target == deleteBoxRef) {
    deleteBoxRef.style.display = 'none';
  }
};
