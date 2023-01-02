<?php
require './data/categories.php';
require './data/products.php';
require './data/filters.php';
$manifest = file_get_contents("./dist/manifest.json");
$manifestObject = json_decode($manifest, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopping Ideas</title>
  <link rel="stylesheet" href="./dist/<?= $manifestObject["js/index.js"]["css"][0] ?>">
  <script src="./dist/<?= $manifestObject["js/index.js"]["file"] ?>" defer></script>
</head>

<body>
  <!-- navbar starts -->
  <nav class="nav-container">
    <div class="logo">
      <span style="position: fixed"> LOGO </span>
    </div>
    <div class="navbar">
      <ul>
        <?php

        // create icons object to translate "database name" => "icon name"
        $icons = [
          "TV" => 'tv',
          "PC" => 'desktop',
          "Laptop" => 'laptop',
          "Tablet" => 'tablet-screen-button',
          "Headphone" => 'headphones-simple',
          "Accessories" => 'toolbox',
          "Smartphone" => 'mobile-screen-button'
        ];

        foreach ($categories as $index => $category) { ?>

          <!-- add class 'active' to the first category and add class 'dropdown' if it has subcategories  -->
          <li class="list<?= ($index == 0 ? " active" : "");
                          ($category["subcategories"] ? " dropdown" : "") ?>" data-category="<?= $category["name"] ?>">

            <a href="#">
              <!-- use icons object -->
              <span class="icon"><i class="fa-solid fa-<?= $icons[$category["name"]] ?>"></i></span>
              <span class="text"><?= $category["name"] ?></span>
            </a>
            <?php if ($category["subcategories"]) { ?>
              <ul>

                <!-- create subcategories inside category -->
                <?php foreach ($category["subcategories"] as $subcategory) { ?>
                  <li data-subcategory="<?= $subcategory["name"] ?>">
                    <a href="#"><?= $subcategory["name"] ?></a>
                  </li>
                <?php } ?>

              </ul>
            <?php } ?>
          </li>
        <?php } ?>

        <div class="indicator">
          <span class="icon-indicator"></span>
        </div>
      </ul>
    </div>
  </nav>
  <!-- navbar finished -->
  <section class="project-main">
    <!-- sidebar-filter starts -->
    <div class="sidebar-container">
      <button class="btn btn-filters">
        <i class="fa-solid fa-filter"></i>
      </button>

      <div class="sidebar-header">
        <h3>Filters</h3>
      </div>
      <div class="sidebar-content">
        <div class="filter-section">
          <h4>Color</h4>
          <div class="filter-option">

            <?php foreach ($colors as $color) { ?>
              <input type="radio" id="color-<?= $color["name"] ?>" name="color" value="<?= $color["name"] ?>" />
              <label class="color-<?= $color["name"] ?>" for="color-<?= $color["name"] ?>"><?= $color["name"] ?></label><br />
            <?php } ?>

            <input type="radio" id="color-none" name="color" value="" />
            <label for="color-none">None</label><br />
          </div>
          <!-- color options -->
        </div>
        <!-- <div class="filter-section">
          <h4>Price</h4>
          <div class="filter-option">
            <input type="radio" id="price-low" name="price" value="low" />
            <label for="price-low">low</label><br />
            <input type="radio" id="price-middle" name="price" value="middle" />
            <label for="price-middle">middle</label><br />
            <input type="radio" id="price-high" name="price" value="high" />
            <label for="price-high">high</label><br /><br />
          </div>
        </div> -->
        <!-- price options -->

        <div class="filter-section">
          <h4>Brands</h4>
          <div class="filter-option">

            <?php foreach ($brands as $brand) { ?>
              <input type="radio" id="brand-<?= $brand["name"] ?>" name="brand" value="<?= $brand["name"] ?>" />
              <label for="brand-<?= $brand["name"] ?>"><?= $brand["name"] ?></label><br />
            <?php } ?>

          </div>
        </div>
        <!-- brand options -->
      </div>
      <div class="sidebar-footer">
        <button class="btn btn-primary apply-filters-btn">Filter</button>
      </div>
    </div>
    <!-- sidebar-filter finished -->

    <!-- product-main started -->
    <div class="product-main">

      <?php foreach ($products as $product) { ?>
        <div class="product-card" data-category="<?= $product["category"] ?>" data-color="<?= $product["color"] ?>" data-brand="<?= $product["brand"] ?>">
          <img src=" <?= $product["img"] ?>" alt="img" />
          <a href="<?= $product["url"] ?>" class="product-card-title">
            <p>
              <?= $product["title"] ?>
            </p>
          </a>
          <div class="product-card-price">
            <h2>€ <?= $product["price"] ?></h2>
          </div>
          <div class="product-card-overlay">
            <h6>About Product</h6>
            <p class="porduct-description">
              <?= $product["description"] ?>
            </p>
            <div>
              <a href="<?= $product["url"] ?>" target="_blank">
                <span><i class="fa-solid fa-link"></i></span>
              </a>
              <a style="margin-left: 10px" href="#">
                <span><button type="button" onclick="openModal(1)">
                    <i class="fa-regular fa-images"></i></button></span>
              </a>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- imagebox started -->

      <div id="myModal1" class="imagebox">
        <span class="close cursor" onclick="closeModal(1)">&times;</span>
        <div class="modal-content">
          <div class="prev-next">
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div class="slides">
              <div class="numbertext">1 / 5</div>
              <img src="https://loremflickr.com/1920/1080?random=1" />
            </div>
            <div class="slides">
              <div class="numbertext">2 / 5</div>
              <img src="https://loremflickr.com/1920/1080?random=2" />
            </div>
            <div class="slides">
              <div class="numbertext">3 / 5</div>
              <img src="https://loremflickr.com/1920/1080?random=3" />
            </div>
            <div class="slides">
              <div class="numbertext">4 / 5</div>
              <img src="https://loremflickr.com/1920/1080?random=4" />
            </div>
            <div class="slides">
              <div class="numbertext">5 / 5</div>
              <img src="https://loremflickr.com/1920/1080?random=5" />
            </div>
          </div>
          <div class="caption-container">
            <p id="caption"></p>
          </div>
          <div class="thumb">
            <div class="column">
              <img class="demo cursor" src="https://loremflickr.com/640/480?random=1" onclick="currentSlide(1)" alt="Nature and sunrise" />
            </div>
            <div class="column">
              <img class="demo cursor" src="https://loremflickr.com/640/480?random=2" onclick="currentSlide(2)" alt="Snow" />
            </div>
            <div class="column">
              <img class="demo cursor" src="https://loremflickr.com/640/480?random=3" onclick="currentSlide(3)" alt="Mountains and fjords" />
            </div>
            <div class="column">
              <img class="demo cursor" src="https://loremflickr.com/640/480?random=4" onclick="currentSlide(4)" alt="Northern Lights" />
            </div>
            <div class="column">
              <img class="demo cursor" src="https://loremflickr.com/640/480?random=5" onclick="currentSlide(5)" alt="Northern Lights" />
            </div>
          </div>
        </div>
      </div>
      <!-- imagebox finished -->
    </div>
    <!-- product-main finished -->
  </section>
</body>

</html>