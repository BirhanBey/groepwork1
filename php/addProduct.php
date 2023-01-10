<?php
require_once '../data/db.php';

if (isset($_POST)) {
    $result = $mysqli->query("
INSERT INTO products (
  brands_id, 
  colors_id, 
  img, 
  title, 
  description, 
  price, 
  url
  )
VALUES (
  " . $_POST["brand"] . ", 
  " . $_POST["color"] . ", 
  '" . $_POST["image"] . "', 
  '" . $_POST["title"] . "', 
  '" . $_POST["description"] . "', 
  " . $_POST["price"] . ", 
  '" . $_POST["url"] . "'
  )
  ");

    $id = $mysqli->insert_id;
    $categoriesValueSql = "";

    foreach ($_POST["categories"] as $category) {
        $categoriesValueSql .= "(" . $id . ", " . $category . "),";
    };

    $sql = "
    INSERT INTO products_has_categories (
        products_id, 
        categories_id
        )
        VALUES
        " . substr($categoriesValueSql, 0, -1);
    $result = $mysqli->query($sql);
};

header("Location: ../admin.php");
