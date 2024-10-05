<?php
session_start();
require_once "required/_required.php";
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>LOG IN</h1>
    <form action="login.php">
        <input type="email" name="email" placeholder="email@example.com" />
        <input type="password" name="pass" placeholder="Password" />
        <button>Log in</button>
    </form>
</body>
</html>