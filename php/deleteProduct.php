<?php
require_once './data/db.php';

if ($_POST['type'] == "productdel") {
    $result = $mysqli->query("DELETE FROM products WHERE id=" . $_POST["product_id"]);
    if ($result) {
        header("Location: ../admin.php");
    }
}
