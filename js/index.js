// navbar onclick
const navbarRef = document.querySelectorAll('.list');
navbarRef.forEach((listItem) =>
  listItem.addEventListener('click', (e) => {
    navbarRef.forEach((listItem) => listItem.classList.remove('active'));
    e.currentTarget.classList.add('active');
  })
);

// sidebar toggle
var sidebar = document.querySelector('.sidebar-container');
var toggleBtn = document.querySelector('.btn-filters');
var closeBtn = document.querySelector('.btn-close');

toggleBtn.onclick = function toggleSidebar() {
  if (sidebar.classList.contains('active')) {
    sidebar.classList.remove('active');
  } else {
    sidebar.classList.add('active');
  }
};
