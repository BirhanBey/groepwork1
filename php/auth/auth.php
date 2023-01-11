<?php
// Direct access to auth.php 
if (!isset($_POST["username"], $_POST["password"])) {
    header("Location: ../../login.php?error=0");
    exit;
}

// Empty fields
if (empty($_POST["username"]) && empty($_POST["password"])) {
    header("Location: ../../login.php?error=1");
    exit;
}
// Empty username
if (empty($_POST["username"])) {
    header("Location: ../../login.php?error=2");
    exit;
}
// Empty password
if (empty($_POST["password"])) {
    header("Location: ../../login.php?error=3");
    exit;
}

$username = $_POST["username"];
$password = hash("sha256", hash("sha256", $_POST["password"]));

if ($username === "admin" && $password === "998ed4d621742d0c2d85ed84173db569afa194d4597686cae947324aa58ab4bb") {
    session_start();
    session_regenerate_id();
    $_SESSION["loggedIn"] = TRUE;
    $_SESSION["username"] = $username;

    header("Location: ../../admin.php");
    exit;
}

// Wrong login
header("Location: ../../login.php?error=4");
exit;
