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
    <title>Automarket</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <h2>Automarket</h2>
    <main>
    <?php
    $query = "SELECT * FROM cars WHERE deleted = 0";
    $result = $db->db->query($query);    
    while($row = $result->fetch_object()) {
        echo "<div class='car_div'>
                <div class='img_div'>
                    <img src='images/sport-car.jpg' width='300'>
                </div>
                <div class='txt_div'>
                    <h4>{$row->make} {$row->model}</h4>
                    <p>{$row->year}</p>
                    <p>{$row->fuel}</p>
                    <p>{$row->price} EUR</p>
                </div>
             <div>";
    }
    ?>
    </main>
    <script src="./js/index.js"></script>
</body>
</html>