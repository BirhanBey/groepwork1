<?php
require_once './data/db.php';

/**
 * GET
 */

$result = $mysqli->query("
SELECT
    * 
FROM 
    categories 
ORDER BY id ASC
");
$SQLcategories = $result->fetch_all(MYSQLI_ASSOC);

$categories = [];
foreach ($SQLcategories as $SQLcategory) {
    // TODO: only add 'subcategories' key when needed
    $SQLcategory['subcategories'] = [];
    if (!$SQLcategory["parent_id"]) {
        array_push($categories, $SQLcategory);
    } else {
        foreach ($categories as $key => $category) {
            if ($category["id"] == $SQLcategory["parent_id"]) {
                array_push($categories[$key]["subcategories"], $SQLcategory);
            }
        }
    }
}
