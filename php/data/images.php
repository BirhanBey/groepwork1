<?php
require_once './php/data/db.php';

$images = $mysqli->query("
SELECT
    * 
FROM
    images
");
