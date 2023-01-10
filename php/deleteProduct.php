<?php
if (isset($_POST['form'])) {
    if ($_POST['type'] == "productdel") {
        $result = $mysqli->query("DELETE FROM products WHERE id=" . $_POST['product_id']);
        if ($result) {
            header("Location: ../admin.php");
        }
    }
}
