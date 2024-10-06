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
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <h2>Automarket</h2>
    <main>
    <?php
    $db->all();
    ?>
    </main>
    <script src="./js/index.js"></script>
</body>
</html>