<?php
session_start();
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Profile</title>
    <script src="https://kit.fontawesome.com/92df62f187.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once "components/_header.php"; ?>
    <main>
        <?php require_once "components/_searchcar.php" ?>
        <div class="bckDiv">
            <i class="fa-regular fa-circle-xmark fa-2xl" id="xmark"></i>
            <i class="fa-solid fa-circle-chevron-left fa-2xl" id="left"></i>
            <i class="fa-solid fa-circle-chevron-right fa-2xl" id="right"></i>
        </div>
        <div class="main">
            <?php
            if(isset($_GET['id'])) {
                if(filter_var($_GET['id'], FILTER_VALIDATE_INT)!==false)
                $db->oneCar($_GET['id']);
                else echo Msg::err("Invalid ID");
            }
            else echo Msg::info("There is no selected car");
            
            ?>
            
        </div>
        <?php 
        if(login()) {
            $query = "SELECT * FROM viewcars WHERE car_id = {$_GET['id']} and deleted = 0";
            $res = $db->db->query($query);
            if($res->num_rows == 1)
            $row = $res->fetch_object();
        }
        ?>
    
        <div class="drop_img_popup">
            <h2>Are you sure you want to cancel this picture?</h2>
            <form action="deleteimg.php" method="POST">
                <input type="hidden" name="id" value="" />
                <button id="yes_img">YES</button>
            </form>
            <button id="no_img">NO</button>
        </div>
        <div class="edit_car_form">
            <i class='fa-solid fa-circle-xmark fa-2xl'></i>
            <form action="carprofile.php?id=<?= $row->car_id ?>" method="post" id="edt_form" enctype="multipart/form-data">
                <div>
                    <!--<input type="text" name="make" value="<?= $row->make ?>">
                    <input type="text" name="model" value="<?= $row->model ?>">-->
                    <select name="make" id="brand">
                        <option value="<?= $row->make ?>"><?= $row->make ?></option>
                        <?php 
                            $query3 = "SELECT * FROM brands";
                            $res3 = $db->db->query($query3);
                            if(mysqli_num_rows($res3) > 0) {
                                while($row3 = $res3->fetch_object()) {
                                    echo "<option value='{$row3->id} {$row3->brand_name}'>{$row3->brand_name}</option>";
                                }
                            } else
                            echo "<input type='text' name='make' placeholder='Make'>";
                        ?>
                    </select>
                    <select name="model" id="model">
                        <option value="<?= $row->model ?>"><?= $row->model ?></option>
                    </select>
                    <input type="number" name="price" value="<?= $row->price ?>">
                    <select name="year" id="year">
                        <option value="<?= $row->year ?>">Year: <?= $row->year ?></option>
                        <?php
                        $year = date("Y");
                        while($year > 1969) {
                            echo "<option value='{$year}'>{$year}</option>";
                            $year--;
                        }
                        ?>
                    </select>
                    <select name="body" id="body">
                        <option value="<?= $row->body ?>">Body type: <?= $row->body ?></option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="Limousine">Limousine</option>
                        <option value="Van">Van</option>
                        <option value="Wagon">Wagon</option>
                        <option value="Convertible">Convertible</option>
                    </select>
                    <select name="fuel" id="fuel">
                        <option value="<?= $row->fuel ?>">Fuel: <?= $row->fuel ?></option>
                        <option value="Gasoline">Gasoline</option>
                        <option value="Diesel">Diesel</option>
                        <option value="TNG">TNG</option>
                        <option value="CNG">CNG</option>
                        <option value="Hybrid">Hybrid</option>
                        <option value="Electric">Electric</option>
                    </select>
                    <input type="number" name="power" value="<?= $row->power ?>">
                    <input type="number" name="engine" value="<?= $row->engine ?>">
                    <input type="number" name="km" value="<?= $row->km ?>">
                    <select name="gear" id="gear">
                        <option value="<?= $row->gear ?>">Gear: <?= $row->gear ?></option>
                        <option value="Manual">Manual</option>
                        <option value="Automatic">Automatic</option>
                    </select>
                    <input type="number" name="doors" value="<?= $row->doors ?>">
                    <input type="number" name="seats" value="<?= $row->seats ?>">
                    <input type="text" name="color" value="<?= $row->color ?>">
                    <select name="wheel" id="wheel">
                        <option value="<?= $row->wheel ?>">Wheel: <?= $row->wheel ?></option>
                        <option value="Front">Front</option>
                        <option value="Rear">Rear</option>
                    </select>
                    <input type="date" name="regdate" value="<?= $row->regdate ?>">
                </div>
                <div>
                    <textarea name="description" id="description" ><?= $row->description ?></textarea>
                    <div class="last">
                        <label for="ph">ADD CAR PHOTOS</label>
                        <input type="file" name="photos[]" id="ph" accept="image/*" multiple>    
                    </div>
                </div>
                    <button>Update</button>
            </form>    
        </div>
        <div class="res_form">
            <?php
                if(isset($_FILES['photos']) && $_FILES['photos']['name'][0] != "") {
                    //echo Msg::success("{$row->car_id} and ID of USER is {$_SESSION['id']}");
                    //exit();
                    for($i = 0; $i < count($_FILES['photos']['name']); $i++) {
                        $name = microtime(true)."_".$_FILES['photos']['name'][$i];
                        if(@move_uploaded_file($_FILES['photos']['tmp_name'][$i], "images/".$name)) {
                            $queryPic = "INSERT INTO pics (car_id, pic_name) VALUES ({$row->car_id}, '{$name}')";
                            $db->db->query($queryPic);
                        }
                    }
                } 
                if(isset($_POST['make'])) {
                    extract($_POST);
                    $str = $make;
                    $make = substr($str, 2);
                    if($make != "" && $model != "" && $price != "" && $year != "" && $body != "" && $fuel != "" && $power != ""
                    && $engine != "" && $km != "" && $gear != "" && $doors != "" && $seats != "" && $color != "" && $wheel != ""
                    && $description != "" && $regdate != "") {
                        $db->updateCar($row->car_id, $_SESSION['id'], $make, $model, $price, $year, $body, $fuel, $power,
                                       $engine, $km, $gear, $doors, $seats, trim($color), $wheel, trim($description), $regdate);
                    } else
                    echo Msg::err("All fields must be filled!");
                }
                Msg::success("The car {$row->model} {$row->make} has been successfully updated by user {$_SESSION['name']}!")
                ?>
                <button id="res-btn">OK</button>
        </div>
        <div class="popup">
            <h2>Are you sure you want to cancel this car?</h2>
            <form action="deletecar.php" method="POST">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                <button id="yes_del">YES</button>
            </form>
            <button id="no_del">NO</button>
        </div>
    </main>
    <?php require_once "components/_careditmenu.php"; ?>
    <?php require_once "components/_footer.php"; ?>

    <script src="./js/index.js"></script>
</body>
</html>