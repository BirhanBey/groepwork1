<?php
require_once './data/db.php';

/**
 * GET
 */

$result = $mysqli->query("
SELECT 
    p.id,
    p.img,
    p.title,
    p.description,
    p.price,
    p.url,
    b.name AS brand,
    col.name AS color,
    GROUP_CONCAT(CONCAT_WS('-', parent_cat.name, cat.name)
        SEPARATOR ',') AS category
FROM
    products AS p
        LEFT JOIN
    brands AS b ON p.brands_id = b.id
        LEFT JOIN
    colors AS col ON p.colors_id = col.id
        LEFT JOIN
    products_has_categories AS pc ON p.id = pc.products_id
        LEFT JOIN
    categories AS cat ON pc.categories_id = cat.id
        LEFT JOIN
    categories AS parent_cat ON cat.parent_id = parent_cat.id
GROUP BY p.id
ORDER BY p.id DESC;
");
$products = $result->fetch_all(MYSQLI_ASSOC);
