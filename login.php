<?php
$manifest = file_get_contents("./dist/manifest.json");
$manifestObject = json_decode($manifest, true);
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
        <form method="post" action="auth.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>