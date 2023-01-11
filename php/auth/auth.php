<?php
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
header("Location: ../../login.php");
exit;
