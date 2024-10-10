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
            <form action="addcar.php" method="post" id="form" enctype="multipart/form-data">
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
                <select name="fuel" id="fuel">
                    <option value="0">--Chose the fuel--</option>
                    <option value="Gasoline">Gasoline</option>
                    <option value="Diesel">Diesel</option>
                    <option value="TNG">TNG</option>
                    <option value="CNG">CNG</option>
                    <option value="Hybrid">Hybrid</option>
                    <option value="Electric">Electric</option>
                </select>
                <input type="number" name="power" placeholder="Engine power">
                <input type="number" name="engine" placeholder="Engine size">
                <input type="number" name="km" placeholder="Km">
                <select name="gear" id="gear">
                    <option value="0">--Chose the gear--</option>
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                </select>
                <input type="number" name="doors" placeholder="Number of doors">
                <input type="number" name="seats" placeholder="Number of seats">
                <input type="text" name="color" placeholder="Color">
                <select name="wheel" id="wheel">
                    <option value="0">Chose the wheel drive--</option>
                    <option value="Front">Front</option>
                    <option value="Rear">Rear</option>
                </select>
                <input type="date" name="regdate" placeholder="Registration expiry">
                <textarea name="description" id="description" placeholder="Add a description of your car"></textarea>
                <button>Add</button>
            </form>
        </div>
    </main>

    <?php require_once "components/_footer.php"; ?>
    
</body>
</html>
