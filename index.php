<?php
require './data/products.php';

$manifest = file_get_contents("./dist/manifest.json");
$manifestObject = json_decode($manifest, true);


// $categories = [];
// foreach ($products as $product) {
//   if (!$product["parent_id"]) {
//     array_push($categories, $product);
//   } else {
//     foreach ($categories as $category) {
//       if ($category["id"] === $product["parent_id"]) {
//         var_dump(array_key_exists("subcategories", $category));
//         if (!array_key_exists("subcategories", $category)) {
//           $category["subcategories"] = array($product);
//           echo '<h1> sub made </h1>';
//           var_dump(array_key_exists("subcategories", $category));
// break;
// } else {
//   echo '<h1> sub added </h1>';
//   array_push($category["subcategories"], $product);
// }
// var_dump($product);
?>
<!-- <pre> -->
<?php
// print_r($category);
?>
<!-- <pre> -->
<?php
//       }
//     }
//   }
// }
?>

<!-- <pre> -->
<?php
// print_r($categories);
?>
<!-- </pre> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopping Ideas</title>
  <!-- <link rel="stylesheet" href="./css/style.scss" />
  <script src="./js/index.js" defer></script> -->
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
        <?php foreach ($products as $index => $product) {
          if (!$product["parent_id"]) {
            if ($index == 0) {
        ?>
              <li class="list active" data-category="<?= $product["name"] ?>">
                <a href="#">
                  <span class="icon"><i class="fa-solid fa-tv"></i></span>
                  <span class="text"><?= $product["name"] ?></span>
                </a>
              </li>
            <?php
            } else {
            ?>
              <li class="list" data-category="<?= $product["name"] ?>">
                <a href="#">
                  <span class="icon"><i class="fa-solid fa-tv"></i></span>
                  <span class="text"><?= $product["name"] ?></span>
                </a>
              </li>
            <?php
            }
          } else {
            ?>
            <li data-subcategory="<?= $product["name"] ?>"><a href="#"><?= $product["name"] ?></a></li>
        <?php
          }
        }
        ?>
        <!-- <li class="list active" data-category="tv">
          <a href="#">
            <span class="icon"><i class="fa-solid fa-tv"></i></span>
            <span class="text">TV</span>
          </a>
        </li>
        <li class="list" data-category="pc">
          <a href="#">
            <span class="icon"><i class="fa-solid fa-desktop"></i></span>
            <span class="text">PC</span>
          </a>
        </li>
        <li class="list" data-category="laptop">
          <a href="#">
            <span class="icon"><i class="fa-solid fa-laptop"></i></span>
            <span class="text">Laptop</span>
          </a>
        </li>
        <li class="list" data-category="smartphone">
          <a href="#">
            <span class="icon"><i class="fa-solid fa-mobile-screen-button"></i></span>
            <span class="text">Smartphone</span>
          </a>
        </li>
        <li class="list" data-category="tablet">
          <a href="#">
            <span class="icon"><i class="fa-solid fa-tablet-screen-button"></i></span>
            <span class="text">Tablet</span>
          </a>
        </li>
        <li class="list" data-category="headphone">
          <a href="#">
            <span class="icon"><i class="fa-solid fa-headphones-simple"></i></span>
            <span class="text">Headphone</span>
          </a>
        </li>
        <li class="list dropdown" data-category="accessories">
          <a href="#">
            <span class="icon"><i class="fa-solid fa-toolbox"></i></span>
            <span class="text"> Accessories</span>
          </a>
          <ul>
            <li data-subcategory="tv"><a href="#">TV</a></li>
            <li data-subcategory="pc"><a href="#">PC</a></li>
            <li data-subcategory="laptop"><a href="#">Laptop</a></li>
            <li data-subcategory="smartphone"><a href="#">Smartphone</a></li>
            <li data-subcategory="tablet"><a href="#">Tablet</a></li>
            <li data-subcategory="headphone"><a href="#">Headphone</a></li>
          </ul>
        </li> -->

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
            <input type="radio" id="color-red" name="color" value="red" />
            <label class="color-red" for="color-red">Red</label><br />
            <input type="radio" id="color-blue" name="color" value="blue" />
            <label class="color-blue" for="color-blue">Blue</label><br />
            <input type="radio" id="color-yellow" name="color" value="yellow" />
            <label class="color-yellow" for="color-yellow">Yellow</label><br />
            <input type="radio" id="color-none" name="color" value="" />
            <label for="color-none">None</label><br />
          </div>
          <!-- color options -->
        </div>
        <div class="filter-section">
          <h4>Price</h4>
          <div class="filter-option">
            <input type="radio" id="price-low" name="price" value="low" />
            <label for="price-low">low</label><br />
            <input type="radio" id="price-middle" name="price" value="middle" />
            <label for="price-middle">middle</label><br />
            <input type="radio" id="price-high" name="price" value="high" />
            <label for="price-high">high</label><br /><br />
          </div>
        </div>
        <!-- price options -->

        <div class="filter-section">
          <h4>Brands</h4>
          <div class="filter-option">
            <input type="radio" id="brand-adidas" name="brand" value="adidas" />
            <label for="brand-adidas">Adidas</label><br />
            <input type="radio" id="brand-nike" name="brand" value="nike" />
            <label for="brand-nike">Nike</label><br />
            <input type="radio" id="brand-puma" name="brand" value="puma" />
            <label for="brand-puma">Puma</label><br />
            <input type="radio" id="brand-asics" name="brand" value="asics" />
            <label for="brand-asics">Asics</label><br />
            <input type="radio" id="brand-reebok" name="brand" value="reebok" />
            <label for="brand-reebok">Reebok</label><br />
            <input type="radio" id="brand-fila" name="brand" value="fila" />
            <label for="brand-fila">Fila</label><br />
            <input type="radio" id="brand-timberland" name="brand" value="timberland" />
            <label for="brand-timberland">Timberland</label><br />
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
      <div class="product-card" data-category="tv">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="pc" data-color="red" data-price="low">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="laptop">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="laptop">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="smartphone">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="tablet">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="tablet">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="tv">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="headphone">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="tv">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="pc">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="laptop">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="smartphone">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="tablet">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="headphone">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="headphone">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>
      <div class="product-card" data-category="accessories" data-subcategory="headphone">
        <img src="./img/1-0.webp" alt="img" />
        <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" class="product-card-title">
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam,
            consequuntur.
          </p>
        </a>
        <div class="product-card-price">
          <h2>$49.99</h2>
        </div>
        <div class="product-card-overlay">
          <h6>About Product</h6>
          <p class="porduct-description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            totam voluptas consequuntur reprehenderit. Molestiae, nostrum
            expedita? Voluptatem quasi explicabo sed iure totam suscipit quia
            minus? Odio culpa nesciunt sit est!
          </p>
          <div>
            <a href="https://www.n11.com/urun/cafele-ak33-rgb-isikli-oyuncu-gamer-gaming-klavye-1803490?magaza=yollasepete" target="_blank">
              <span><i class="fa-solid fa-link"></i></span>
            </a>
            <a style="margin-left: 10px" href="#">
              <span><button type="button" onclick="openModal(1)">
                  <i class="fa-regular fa-images"></i></button></span>
            </a>
          </div>
        </div>
      </div>

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