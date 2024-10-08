<?php
session_start();
require_once "required/_required.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automarket</title>
    <script src="https://kit.fontawesome.com/92df62f187.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
    <style>

    </style>
</head>
<body>
    <?php require_once "components/_header.php" ?>
    <main>
        <div class="main">
            <?php
            $db->all();
            ?>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>