// navbar onclick
const list = document.querySelectorAll(".list");
function activeLink() {
  list.forEach((item) => item.classList.remove("active"));
  this.classList.add("active");
}
list.forEach((item) => item.addEventListener("click", activeLink));

// sidebar toggle
var sidebar = document.querySelector(".sidebar-container");
var toggleBtn = document.querySelector(".btn-filters");
var closeBtn = document.querySelector(".btn-close");

toggleBtn.onclick = function toggleSidebar() {
  if (sidebar.classList.contains("active")) {
    sidebar.classList.remove("active");
  } else {
    sidebar.classList.add("active");
  }
};
