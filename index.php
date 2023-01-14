<?php
require './php/data/categories.php';
require './php/data/products.php';
require './php/data/filters.php';
require './php/data/images.php';

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./dist/<?= $manifestObject["js/index.css"]["file"] ?>">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
  <script type="module" src="./dist/<?= $manifestObject["js/index.js"]["file"] ?>" defer></script>
</head>

<body>
  <!-- navbar starts -->
  <nav class="nav-container">
    <div>
      <img class="logo" src="./img/logo3.png" alt="">
    </div>
    <a href="./admin.php">Admin Page</a>
    <div class="navbar">
      <ul>
        <li class="list active" data-category="All">
          <a href="">
            <!-- use icons object -->
            <span class="icon"><i class="fa-solid fa-earth-americas"></i></span>
            <span class="text">All</span>
          </a>
        </li>
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

        foreach ($categories as $index => $category) {

          // add class 'active' to the first category and add class 'dropdown' if it has subcategories
          $class = "list";
          if ($category["subcategories"]) {
            $class .= " dropdown";
          }
        ?>

          <li class="<?= $class ?>" data-category="<?= $category["name"] ?>">
            <a href="#">
              <!-- use icons object -->
              <span class="icon"><i class="fa-solid fa-<?= $icons[$category["name"]] ?>"></i></span>
              <span class="text"><?= $category["name"] ?></span>
            </a>
            <?php if ($category["subcategories"]) { ?>
              <ul>

                <!-- create subcategories inside category -->
                <?php foreach ($category["subcategories"] as $subcategory) { ?>
                  <li data-category="<?= $category["name"] . "-" . $subcategory["name"] ?>">
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
      <!-- <div class="sidebar-footer">
        <button class="btn btn-primary apply-filters-btn">Filter</button>
      </div> -->
    </div>
    <!-- sidebar-filter finished -->

    <!-- product-main started -->
    <div class="product-main">
      <?php foreach ($products as $product) { ?>
        <div class="product-card" data-id="<?= $product["id"] ?>" data-category="<?= $product["category"] ?>" data-color="<?= $product["color"] ?>" data-brand="<?= $product["brand"] ?>">
          <div class="inset">
            <img src=" <?= $product["img"] ?>" alt="img" />
            <a href="<?= $product["url"] ?>" class="product-card-title">
              <?= $product["title"] ?>
            </a>
            <div class="product-card-price">
              <h2>€ <?= $product["price"] ?></h2>
            </div>
            <div class="product-card-overlay">
              <h6>About Product</h6>
              <p class="product-description">
                <?=
                // making short description from 300 char
                strlen($product["description"]) > 300
                  ?
                  substr($product["description"], 0, 300) . "..."
                  :
                  $product["description"]
                ?>
              </p>
              <div class="connection">
                <a href="<?= $product["url"] ?>" target="_blank">
                  <span><i class="fa-solid fa-link"></i></span>
                </a>
                <a style="margin-left: 10px" href="#">
                  <button type="button" class="imgbtn"><span>
                      <i class="fa-regular fa-images"></i></span></button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- imagebox started -->

        <div id="myModal-<?php echo $product['id']; ?>" class="imagebox" data-id="<?= $product["id"] ?>">
          <span class="close cursor">&times;</span>
          <div class="modal-content">
            <div class="swiper">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">

                <!-- Slides -->
                <?php
                foreach ($images as $image) {
                  if ($product['id'] == $image["products_id"]) {
                    echo '<div class="swiper-slide"><img src="' . $image['src'] . '" alt="' . $image['alt'] . '"></div>';
                  }
                }
                ?>

              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>

              <!-- If we need navigation buttons -->
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>

              <!-- If we need scrollbar -->
              <div class="swiper-scrollbar"></div>
            </div>
          </div>
        </div>
        <!-- imagebox finished -->
      <?php } ?>


    </div>
    <!-- product-main finished -->
  </section>
</body>

</html>