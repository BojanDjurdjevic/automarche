<?php
session_start();
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Search</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php require_once "components/_header.php" ?>
    <main>
        <?php require_once "components/_searchcar.php" ?>
        <h2>Your Search</h2>
        <div class="main">
            <?php
            $make = "";
            $model = "";
            $price = "";
            $km = "";
            $year = "";
            $fuel = "";

            if(isset($_GET['make'])) {
                $str = $_GET['make'];
                $make = trim(substr($str, 2));
            }
            if(isset($_GET['model'])) {
                $model = $_GET['model']; 
            }
            if(isset($_GET['price'])) {
                $price = $_GET['price']; 
            }
            if(isset($_GET['km'])) {
                $km = $_GET['km']; 
            }
            if(isset($_GET['year'])) {
                $year = $_GET['year']; 
            }
            if(isset($_GET['fuel'])) {
                $fuel = $_GET['fuel']; 
            }
            $query = "";
            if($make != "" or $model != "" or $price != "" or $km != "" or $year != 0 or $fuel != 0) {
                if($make != "" && $model != "" && $price != "" && $km != "" && $year != 0 && $fuel != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    price <= {$price} and km <= {$km} and year >= {$year} and fuel = '{$fuel}'";
                } elseif ($make != "" && $model != "" && $price != "" && $km != "" && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    price <= {$price} and km <= {$km} and year >= {$year}";
                } elseif ($make != "" && $model != "" && $price != "" && $km != "" && $fuel != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    price <= {$price} and km <= {$km} and fuel = '{$fuel}'";
                } elseif ($make != "" && $model != "" && $price != "" && $fuel != 0 && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    price <= {$price} and fuel = '{$fuel}' and year >= {$year}";
                } elseif ($make != "" && $model != "" && $fuel != 0 && $km != "" && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    fuel = '{$fuel}' and km <= {$km} and year >= {$year}";
                } elseif ($make != "" && $fuel != 0 && $price != "" && $km != "" && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and fuel = '{$fuel}' and 
                    price <= {$price} and km <= {$km} and year >= {$year}";
                } elseif ($fuel != 0 && $model != "" && $price != "" && $km != "" && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE fuel = '{$fuel}' and model = '{$model}' and 
                    price <= {$price} and km <= {$km} and year >= {$year}";
                } elseif ($make != "" && $model != "" && $price != "" && $km != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    price <= {$price} and km <= {$km}";
                } elseif ($make != "" && $model != "" && $price != "" && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    price <= {$price} and year >= {$year}";
                } elseif ($make != "" && $model != "" && $year != 0 && $km != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    year >= {$year} and km <= {$km}";
                } elseif ($make != "" && $year != 0 && $price != "" && $km != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and year >= {$year} and 
                    price <= {$price} and km <= {$km}";
                } elseif ($year != "" && $model != "" && $price != "" && $km != "") {
                    $query = "SELECT * FROM viewcars WHERE year >= {$year} and model = '{$model}' and 
                    price <= {$price} and km <= {$km}";
                } elseif ($make != "" && $model != "" && $price != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    price <= {$price}";
                } elseif ($make != "" && $model != "" && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}' and 
                    year >= {$year}";
                } elseif ($make != "" && $year != 0 && $price != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and year >= {$year} and 
                    price <= {$price}";
                } elseif ($km != "" && $year != 0 && $price != "") {
                    $query = "SELECT * FROM viewcars WHERE km <= '{$km}' and year >= '{$year}' and 
                    price <= {$price}";
                }
                elseif ($make != "" && $model != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and model = '{$model}'";
                } elseif ($price != "" && $km != "") {
                    $query = "SELECT * FROM viewcars WHERE price = '{$price}' and km <= '{$km}'";
                } elseif ($year != 0 && $fuel != 0) {
                    $query = "SELECT * FROM viewcars WHERE year >= '{$year}' and fuel = '{$fuel}'";
                } elseif ($make != "" && $fuel != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and fuel = '{$fuel}'";
                } elseif ($make != "" && $price != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and price <= '{$price}'";
                } elseif ($make != "" && $km != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and km <= '{$km}'";
                } elseif ($make != "" && $year != 0) {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}' and year >= '{$year}'";
                } elseif ($year != 0 && $price != "") {
                    $query = "SELECT * FROM viewcars WHERE year >= '{$year}' and price <= '{$price}'";
                } elseif ($make != "") {
                    $query = "SELECT * FROM viewcars WHERE make = '{$make}'";
                } elseif ($model != "") {
                    $query = "SELECT * FROM viewcars WHERE model = '{$model}'";
                } elseif ($price != "" ) {
                    $query = "SELECT * FROM viewcars WHERE price <= '{$price}'";
                } elseif ($km != "") {
                    $query = "SELECT * FROM viewcars WHERE km <= '{$km}'";
                } elseif ($year != 0) {
                    $query = "SELECT * FROM viewcars WHERE year >= '{$year}'";
                } elseif ($fuel != 0) {
                    $query = "SELECT * FROM viewcars WHERE fuel = '{$fuel}'";
                }
            } else 
            echo Msg::err("At least one parameter should be set!"); /*
            var_dump($query);
            exit(); */
            if($query != "") {
                $res = $db->db->query($query); 
                if($res->num_rows > 0) {
                    while($row = $res->fetch_object()) {
                        echo "<a href='carprofile.php?id={$row->car_id}' id='link'><div class='car_div'>";
                                $query2 = "SELECT * FROM pics WHERE car_id = {$row->car_id}";
                                $result2 = $db->db->query($query2);
                                if(mysqli_num_rows($result2) > 0) {
                                    $r = $result2->fetch_assoc();
                                        echo "<div class='img_div' class='card' style='background-image: url(./images/{$r['pic_name']});
                                            background-position: center; background-repeat: no-repeat; background-size: cover;'>";
                                } else
                                echo "<div class='img_div' class='card' style='background-image: url(./images/nocar.jpg);
                                background-position: center; background-repeat: no-repeat; background-size: cover;'>";
                                echo
                                "</div>
                                <div class='txt_div'>
                                    <h4>{$row->make} {$row->model}</h4>
                                    <p>Year: {$row->year}</p>
                                    <p>Fuel: {$row->fuel}</p>
                                    <p>{$row->price} EUR</p>
                                </div>
                                <div class='txt_div'>
                                    <h4>Saler: {$row->name}</h4>
                                    <p>Country: {$row->country}</p>
                                    <p>City: {$row->city}</p>
                                    <p>Address: {$row->address} </p>
                                    <p>Tel: {$row->usr_tel}</p>

                                </div>
                            </div></a>";
                    }
                } else 
                echo Msg::success("There is no car with requested parameters!");
            } else 
            echo Msg::err("At least one parameter should be set!");
            ?>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>