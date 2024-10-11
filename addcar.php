<?php
session_start();
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
            <?php
                if(!login()) {
                    echo Msg::err("You must be loged in!");
                } else
                require_once "components/_addcarform.php"; 
                if(isset($_POST['make']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['year']) && isset($_POST['body'])
                && isset($_POST['fuel']) && isset($_POST['power']) && isset($_POST['engine']) && isset($_POST['km'])) {
                    extract($_POST);
                    $usr_id = $_SESSION['id'];
                    if(validateString($make) && validateString($model) && filter_var((int)$price, FILTER_VALIDATE_INT) && validateString($year)
                    && validateString($body) && validateString($fuel) && filter_var((int)$power, FILTER_VALIDATE_INT) && filter_var((int)$engine, FILTER_VALIDATE_INT)
                    && filter_var((int)$km, FILTER_VALIDATE_INT) && validateString($gear) && filter_var((int)$doors, FILTER_VALIDATE_INT)
                    && filter_var((int)$seats, FILTER_VALIDATE_INT) && validateString($color) && validateString($wheel)
                    && validateString($description)) {
                        /* var_dump((int)$usr_id, $make, $model, (int)$price, $year, $body, $fuel, (int)$power, (int)$engine, (int)$km, 
                        $gear, (int)$doors, (int)$seats, $color, $wheel, $description, date_create($regdate));
                        exit(); */
                        $db->insertCar((int)$usr_id, $make, $model, (int)$price, $year, $body, $fuel, (int)$power, (int)$engine, (int)$km, 
                        $gear, (int)$doors, (int)$seats, $color, $wheel, $description, $regdate);
                    } else
                    echo Msg::err("All car data should be correctly set!");
                }
            ?>
            
        </div>
    </main>

    <?php require_once "components/_footer.php"; ?>
    
</body>
</html>
