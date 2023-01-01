<?php $db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'rootpass';
$db_db = 'groupwork1';
$db_port = 3306;

$mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
    $db_port
);

if ($mysqli->connect_error) {
    echo 'Errno: ' . $mysqli->connect_errno;
    echo '<br>';
    echo 'Error: ' . $mysqli->connect_error;
    exit();
}

/**
 * GET
 */

$result = $mysqli->query("SELECT * FROM categories ORDER BY id ASC");
$products = $result->fetch_all(MYSQLI_ASSOC);
