<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="./css/admin.scss" />
  </head>
  <body>
    <!-- admin page start -->
    <div class="navigation">
      <ul>
        <li class="list">
          <b></b>
          <b></b>
          <a href="../index.php">
            <span class="icon"><i class="fa-solid fa-house-user"></i></span>
            <span class="title">Home</span>
          </a>
        </li>
        <li class="list active">
          <b></b>
          <b></b>
          <a href="#">
            <span class="icon"><i class="fa-solid fa-gears"></i></span>
            <span class="title">Product</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="toggle">
      <i class="fa-solid fa-bars open"></i>
      <i class="fa-solid fa-xmark close"></i>
    </div>
    <div class="product-table">
      <div class="head">
        <h1>Products</h1>
        <button class="add-item-page">
          <i class="fa-solid fa-plus"></i>
          New Item
        </button>
      </div>
      <table class="products">
        <tr>
          <th>ID</th>
          <th class="tog hide">Image</th>
          <th>Title</th>
          <th class="tog hide">Description</th>
          <th>Categories</th>
          <th>Color</th>
          <th>Price</th>
          <th>Brand</th>
          <th class="tog hide">URL</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <tr>
          <td id="">#113</td>
          <td id="" class="tog hide">
            URL
            alşdaksdlkmaşlsdkmcaşskdfjalskdnvşaksdnfnaşsdlknvşalksdncşajkdsnvşkasjfdvşakjsfdnşvkjnaşfsjkvafds
          </td>
          <td id="">Mouse</td>
          <td id="" class="tog hide">
            very high dpi gamer mouse asldkmfşalksdfş askdmfalks asdlkfaslkdfa
            asldkalskdfjasd asldkffaslkdjfasd asşdlkfjadska dsladslkfa sdfsdsf
            sdk
          </td>
          <td id="">7,2</td>
          <td id="">color</td>
          <td id="">$42,21</td>
          <td id="">privacy</td>
          <td class="tog hide">
            https://
            alşdaksdlkmaşlsdkmcaşskdfjalskdnvşaksdnfnaşsdlknvşalksdncşajkdsnvşkasjfdvşakjsfdnşvkjnaşfsjkvafds
          </td>
          <td>
            <button><i class="fa-solid fa-square-check"></i></button>
            <button>
              <i class="fa-solid fa-square-xmark" style="color: red"></i>
            </button>
          </td>
          <td>
            <button type="button" value="">
              <i
                class="fa-solid fa-trash-can-arrow-up"
                onclick="document.getElementById('delete-box').style.display='block'"
              ></i>
            </button>
            <button class="editBtn">
              <i class="fa-solid fa-marker"></i>
            </button>
          </td>
        </tr>
      </table>
    </div>

    <!-- New Item form -->
    <div class="new-item">
      <div class="background">
        <p class="border"></p>
        <div class="form">
          <div class="info info1">
            <i class="fa-solid fa-hashtag icon"></i>
            <label for="product-id">ID</label><br />
            <p>ID</p>
          </div>
          <div class="info info2">
            <i class="fa-regular fa-image icon"></i>
            <label class="active" for="image">Image</label><br />
            <input
              type="text"
              id="image"
              name="fav_language"
              placeholder="  Image"
            />
          </div>
          <div class="info info3">
            <i class="fa-solid fa-t icon"></i>
            <label for="title">Title</label><br />
            <input
              type="text"
              id="title"
              name="fav_language"
              placeholder="  Title"
            />
          </div>
          <div class="info info4">
            <i class="fa-regular fa-file-lines icon"></i>
            <label for="descript">Description</label><br />
            <input
              type="text"
              id="descript"
              name="fav_language"
              placeholder="  Description"
            />
          </div>
          <div class="info info5">
            <i class="fa-solid fa-boxes-stacked icon"></i>
            <label for="categories">Categories</label><br />
            <input
              type="text"
              id="categories"
              name="fav_language"
              placeholder="  Categories"
            />
          </div>
          <div class="info info6">
            <i class="fa-solid fa-palette icon"></i>
            <label for="color">Color</label><br />
            <input
              type="text"
              id="color"
              name="fav_language"
              placeholder="  Color"
            />
          </div>
          <div class="info info7">
            <i class="fa-solid fa-euro-sign icon"></i>
            <label for="price">Price</label><br />
            <input
              type="text"
              id="price"
              name="fav_language"
              placeholder="  Price"
            />
          </div>
          <div class="info info8">
            <i class="fa-regular fa-copyright icon"></i>
            <label for="brand">Brand</label><br />
            <input
              type="text"
              id="brand"
              name="fav_language"
              placeholder="  Brand"
            />
          </div>

          <div class="info info9">
            <i class="fa-solid fa-link icon"></i>
            <label for="url">URL</label><br />
            <input
              type="text"
              id="url"
              name="fav_language"
              placeholder="  URL"
            />
          </div>
        </div>
        <button class="close-addnew">
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
        <button class="add-item">Add Item</button>
      </div>
    </div>
    <!-- Edit Item form -->
    <div class="edit-item">
      <div class="background">
        <p class="border"></p>
        <div class="form">
          <div class="info info1">
            <i class="fa-solid fa-hashtag icon"></i>
            <label for="product-id">ID</label><br />
            <p>ID</p>
          </div>
          <div class="info info2">
            <i class="fa-regular fa-image icon"></i>
            <label class="active" for="image">Image</label><br />
            <input
              type="text"
              id="image"
              name="fav_language"
              placeholder="  Image"
            />
          </div>
          <div class="info info3">
            <i class="fa-solid fa-t icon"></i>
            <label for="title">Title</label><br />
            <input
              type="text"
              id="title"
              name="fav_language"
              placeholder="  Title"
            />
          </div>
          <div class="info info4">
            <i class="fa-regular fa-file-lines icon"></i>
            <label for="descript">Description</label><br />
            <input
              type="text"
              id="descript"
              name="fav_language"
              placeholder="  Description"
            />
          </div>
          <div class="info info5">
            <i class="fa-solid fa-boxes-stacked icon"></i>
            <label for="categories">Categories</label><br />
            <input
              type="text"
              id="categories"
              name="fav_language"
              placeholder="  Categories"
            />
          </div>
          <div class="info info6">
            <i class="fa-solid fa-palette icon"></i>
            <label for="color">Color</label><br />
            <input
              type="text"
              id="color"
              name="fav_language"
              placeholder="  Color"
            />
          </div>
          <div class="info info7">
            <i class="fa-solid fa-euro-sign icon"></i>
            <label for="price">Price</label><br />
            <input
              type="text"
              id="price"
              name="fav_language"
              placeholder="  Price"
            />
          </div>
          <div class="info info8">
            <i class="fa-regular fa-copyright icon"></i>
            <label for="brand">Brand</label><br />
            <input
              type="text"
              id="brand"
              name="fav_language"
              placeholder="  Brand"
            />
          </div>
          <div class="info info9">
            <i class="fa-solid fa-link icon"></i>
            <label for="url">URL</label><br />
            <input
              type="text"
              id="url"
              name="fav_language"
              placeholder="  URL"
            />
          </div>
        </div>
        <button class="close-edit">
          <i class="fa-regular fa-circle-xmark"></i>
        </button>
        <button class="save-item">Save Item</button>
      </div>
    </div>
    <!-- delete confirmation -->
    <div id="delete-box" class="deletebox">
      <span
        onclick="document.getElementById('delete-box').style.display='none'"
        class="close"
        title="Close deletebox"
        ><i class="fa-solid fa-xmark"></i
      ></span>
      <form class="deletebox-content" action="/action_page.php">
        <div class="container">
          <h1>Delete Item</h1>
          <p>Are you sure you want to delete the Item?</p>

          <div class="buttonbox">
            <button
              type="button"
              onclick="document.getElementById('delete-box').style.display='none'"
              class="cancelbtn"
            >
              Cancel
            </button>
            <button
              type="button"
              onclick="document.getElementById('delete-box').style.display='none'"
              class="deletebtn"
            >
              Delete
            </button>
          </div>
        </div>
      </form>
    </div>
    <!-- admin page finished -->

    <!-- navbar toggle -->
    <script>
      let menuToggle = document.querySelector(".toggle");
      let navigation = document.querySelector(".navigation");
      let table = document.querySelector(".product-table");
      menuToggle.onclick = function () {
        menuToggle.classList.toggle("active");
        navigation.classList.toggle("active");
        table.classList.toggle("active");
      };
    </script>
    <!-- navbar selection -->
    <script>
      const list = document.querySelectorAll(".list");
      function activeLink() {
        list.forEach((item) => item.classList.remove("active"));
        this.classList.add("active");
      }
      list.forEach((item) => item.addEventListener("click", activeLink));
    </script>

    <!-- add new item focus-- this should move when you click each input but ony first one is working Ihope you can fix it or we can just delete it-->
    <script>
      let input = document.querySelector(".info input");
      let info = document.querySelector(".info");

      input.onclick = function () {
        info.classList.toggle("active");
      };

      // input.onclick = function () {
      //   info.forEach((e) => e.classList.toggle("active"));
      // };
    </script>
    <!-- focus -->
    <!-- close -->
    <script>
      let closebtn = document.querySelector(".close-addnew");
      let addWindow = document.querySelector(".new-item");
      let newitembtn = document.querySelector(".add-item-page");
      let closeEditBtn = document.querySelector(".close-edit");
      let editWindow = document.querySelector(".edit-item");
      let edititembtn = document.querySelector(".editBtn");

      closebtn.onclick = function () {
        addWindow.style.display = "none";
      };
      newitembtn.onclick = function () {
        addWindow.style.display = "flex";
      };
      closeEditBtn.onclick = function () {
        editWindow.style.display = "none";
      };
      edititembtn.onclick = function () {
        editWindow.style.display = "flex";
      };
      addWindow.onclick = function (event) {
        if (event.target == addWindow) {
          addWindow.style.display = "none";
        }
      };
      editWindow.onclick = function (event) {
        if (event.target == editWindow) {
          editWindow.style.display = "none";
        }
      };
    </script>
    
    <!-- delete item -->
    <script>
      const deletebox = document.getElementById("delete-box");

      window.onclick = function (event) {
        if (event.target == deletebox) {
          deletebox.style.display = "none";
        }
      };
    </script>

  </body>
</html>