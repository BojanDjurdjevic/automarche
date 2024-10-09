<?php
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new car</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once "components/_header.php"; ?>
    <main>
        <div class="main">
            <form action="addcar.php">
                <input type="text" name="make" placeholder="Make">
                <input type="text" name="model" placeholder="Model">
                <input type="number" name="price" placeholder="Price">
                <input type="year" name="year" placeholder="Year">
                <select name="body" id="body">
                    <option value="0">--Choose the body type--</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Limousine">Limousine</option>
                    <option value="Van">Van</option>
                    <option value="Wagon">Wagon</option>
                    <option value="Convertible">Convertible</option>
                </select>
            </form>
        </div>
    </main>

    <?php require_once "components/_footer.php"; ?>
    
</body>
</html>
