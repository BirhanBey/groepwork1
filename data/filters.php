<?php
require_once './data/db.php';

/**
 * GET
 */

$resultColors = $mysqli->query("
SELECT * FROM colors;
");
$colors = $resultColors->fetch_all(MYSQLI_ASSOC);

$resultBrands = $mysqli->query("
SELECT * FROM brands;
");
$brands = $resultBrands->fetch_all(MYSQLI_ASSOC);
