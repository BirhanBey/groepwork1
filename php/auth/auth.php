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
$password = $_POST["password"];

if ($username === "admin" && $password === "admin") {
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
