<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="searchForm">
        <form action="search.php" method="GET">
            <input type="text" name="make" placeholder="Choose Make">
            <input type="text" name="model" placeholder="Choose Model">
            <input type="number" name="price" placeholder="Price up to">
            <input type="number" name="km" placeholder="Km up to">
            <select name="year" id="year">
                <option value="0">--Year from--</option>
                <?php
                $year = date("Y");
                while($year > 1969) {
                    echo "<option value='{$year}'>{$year}</option>";
                    $year--;
                }
                ?>
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
            <button>Search</button>
            <!--<a href="search.php"></a>--> 
        </form>
    </div>
</body>
</html>