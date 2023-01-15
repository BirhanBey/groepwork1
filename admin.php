<?php
session_start();

if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
  header("Location: ./login.php");
  exit;
}

$manifest = file_get_contents("./dist/manifest.json");
$manifestObject = json_decode($manifest, true);

require './php/data/products.php';
require './php/data/categories.php';
require './php/data/filters.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Page</title>
  <link rel="stylesheet" href="./dist/<?= $manifestObject["js/admin.css"]["file"] ?>">
  <script src="./dist/<?= $manifestObject["js/admin.js"]["file"] ?>" defer></script>
</head>

<body>
  <!-- admin page start -->
  <div class="navigation">
    <ul>
      <li class="list">
        <b></b>
        <b></b>
        <a href="./index.php">
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
      <li class="list">
        <b></b>
        <b></b>
        <a href="./php/auth/logout.php">
          <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
          <span class="title">Log Out</span>
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
        <th>Title</th>
        <th>Categories</th>
        <th>Color</th>
        <th>Price</th>
        <th>Brand</th>
        <th>Status</th>
        <th>Action</th>
      </tr>

      <?php foreach ($products as $product) { ?>
        <tr id="<?= $product["id"] ?>">
          <td>#<?= $product["id"] ?></td>
          <td><?= $product["title"] ?></td>
          <td><?= $product["category"] ?></td>
          <td><?= $product["color"] ?></td>
          <td><?= $product["price"] ?></td>
          <td><?= $product["brand"] ?></td>
          <td>
            <button class="product__status<?= !$product["status"] ? ' product__status--error' : '' ?>" disabled>
              <i class="fa-solid fa-square-<?= $product["status"] ? 'check' : 'xmark' ?>"></i>
            </button>
          </td>
          <td>
            <button class="product__delete">
              <i class="fa-solid fa-trash-can-arrow-up"></i>
            </button>

            <!-- <button class="editBtn">
              <i class="fa-solid fa-marker"></i>
            </button> -->
          </td>
        </tr>
      <?php } ?>

    </table>
  </div>

  <!-- New Item form -->
  <div class="new-item">
    <div class="background">
      <p class="border"></p>
      <form class="form" method="post" action="php/addProduct.php">
        <div class="info info1">
          <i class="fa-solid fa-hashtag icon"></i>
          <label for="product-id">ID</label><br />
          <p>ID</p>
        </div>
        <div class="info info2">
          <i class="fa-regular fa-image icon"></i>
          <label class="active" for="image">Image</label><br />
          <input type="text" id="image" name="image" placeholder="  Image" />
        </div>
        <div class="info info3">
          <i class="fa-solid fa-t icon"></i>
          <label for="title">Title</label><br />
          <input type="text" id="title" name="title" placeholder="  Title" />
        </div>
        <div class="info info4">
          <i class="fa-regular fa-file-lines icon"></i>
          <label for="description">Description</label><br />
          <input type="text" id="description" name="description" placeholder="  Description" />
        </div>
        <div class="info info5">
          <i class="fa-solid fa-boxes-stacked icon"></i>
          <label for="categories">Categories</label><br />
          <select id="categories" class="list-selector" name="categories[]" multiple>
            <option value="" selected disabled hidden>Choose a or multiple categories</option>

            <?php foreach ($categories as $category) { ?>
              <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
              <?php if ($category["subcategories"]) { ?>
                <optgroup label="<?= $category["name"] ?>">

                  <?php foreach ($category["subcategories"] as $subcategory) { ?>
                    <option value="<?= $subcategory["id"] ?>"><?= $subcategory["name"] ?></option>
              <?php
                  }
                }
              } ?>

          </select>
        </div>
        <div class="info info6">
          <i class="fa-solid fa-palette icon"></i>
          <label for="color">Color</label><br />
          <select id="color" class="list-selector" name="color">
            <option value="" selected disabled hidden>Choose a color</option>

            <?php foreach ($colors as $color) { ?>
              <option value="<?= $color["id"] ?>"><?= $color["name"] ?></option>
            <?php } ?>

          </select>
        </div>
        <div class="info info7">
          <i class="fa-solid fa-euro-sign icon"></i>
          <label for="price">Price</label><br />
          <input type="number" id="price" name="price" step=".01" placeholder="  Price" />
        </div>
        <div class="info info8">
          <i class="fa-regular fa-copyright icon"></i>
          <label for="brand">Brand</label><br />
          <select id="brand" class="list-selector" name="brand">
            <option value="" selected disabled hidden>Choose a brand</option>

            <?php foreach ($brands as $brand) { ?>
              <option value="<?= $brand["id"] ?>"><?= $brand["name"] ?></option>
            <?php } ?>

          </select>
        </div>
        <div class="info info9">
          <i class="fa-solid fa-link icon"></i>
          <label for="url">URL</label><br />
          <input type="text" id="url" name="url" placeholder="  URL" />
        </div>
        <button type="submit" class="add-item">Add Item</button>
      </form>
      <button class="close-addnew">
        <i class="fa-regular fa-circle-xmark"></i>
      </button>
      <!-- <button type="submit" class="add-item">Add Item</button> -->
    </div>
  </div>
  <!-- Edit Item form -->
  <!-- <div class="edit-item">
    <div class="background">
      <p class="border"></p>
      <form class="form">
        <div class="info info1">
          <i class="fa-solid fa-hashtag icon"></i>
          <label for="product-id">ID</label><br />
          <p>ID</p>
        </div>
        <div class="info info2">
          <i class="fa-regular fa-image icon"></i>
          <label class="active" for="image">Image</label><br />
          <input type="text" id="image" name="fav_language" placeholder="  Image" />
        </div>
        <div class="info info3">
          <i class="fa-solid fa-t icon"></i>
          <label for="title">Title</label><br />
          <input type="text" id="title" name="fav_language" placeholder="  Title" />
        </div>
        <div class="info info4">
          <i class="fa-regular fa-file-lines icon"></i>
          <label for="description">Description</label><br />
          <input type="text" id="description" name="fav_language" placeholder="  Description" />
        </div>
        <div class="info info5">
          <i class="fa-solid fa-boxes-stacked icon"></i>
          <label for="categories">Categories</label><br />
          <input type="text" id="categories" name="fav_language" placeholder="  Categories" />
        </div>
        <div class="info info6">
          <i class="fa-solid fa-palette icon"></i>
          <label for="color">Color</label><br />
          <input type="text" id="color" name="fav_language" placeholder="  Color" />
        </div>
        <div class="info info7">
          <i class="fa-solid fa-euro-sign icon"></i>
          <label for="price">Price</label><br />
          <input type="text" id="price" name="fav_language" placeholder="  Price" />
        </div>
        <div class="info info8">
          <i class="fa-regular fa-copyright icon"></i>
          <label for="brand">Brand</label><br />
          <input type="text" id="brand" name="fav_language" placeholder="  Brand" />
        </div>
        <div class="info info9">
          <i class="fa-solid fa-link icon"></i>
          <label for="url">URL</label><br />
          <input type="text" id="url" name="fav_language" placeholder="  URL" />
        </div>
        <button type="submit" class="save-item">Save Item</button>
      </form>
      <button class="close-edit">
        <i class="fa-regular fa-circle-xmark"></i>
      </button>
    </div>
  </div> -->
  <!-- delete confirmation -->
  <div id="delete-box" class="deletebox">
    <span class="close" title="Close deletebox"><i class="fa-solid fa-xmark"></i></span>
    <form id="productDeleteForm" class="deletebox-content" method="post" action="php/deleteProduct.php">
      <div class="container">
        <h1>Delete Item</h1>
        <p>Are you sure you want to delete the Item?</p>

        <div class="buttonbox">
          <button type="button" class="cancelbtn">
            Cancel
          </button>
          <input type="hidden" name="product_id">
          <input type="hidden" name="type" value="productdel">
          <button type="submit" class="deletebtn">
            Delete
          </button>
        </div>
      </div>
    </form>
  </div>
  <!-- admin page finished -->
</body>

</html>