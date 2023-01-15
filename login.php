<?php
$manifest = file_get_contents("./dist/manifest.json");
$manifestObject = json_decode($manifest, true);

$errors = [
    "No direct access to auth",
    "Please fill in all the fields",
    "Please fill in your username",
    "Please fill in your password",
    "The username or password is incorrect"
];
$usernameErrors = [1, 2, 4];
$passwordErrors = [1, 3, 4];

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="./dist/<?= $manifestObject["js/login.css"]["file"] ?>">
    <script src="./dist/<?= $manifestObject["js/login.js"]["file"] ?>" defer></script>
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <p><?php
            if (isset($_GET["error"])) {
                echo $errors[$_GET["error"]];
            }
            ?></p>
        <form method="post" action="./php/auth/auth.php">
            <input <?php if (isset($_GET["error"]) && in_array($_GET["error"], $usernameErrors)) {
                        echo 'class="error"';
                    } ?>type="text" id="username" name="username" placeholder="Username">
            <input <?php if (isset($_GET["error"]) && in_array($_GET["error"], $passwordErrors)) {
                        echo 'class="error"';
                    } ?> type="password" id="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>