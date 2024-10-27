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
            if(isset($_SESSION['carupdate'])) {
                echo Msg::success($_SESSION['carupdate']);
                unset($_SESSION['carupdate']);
            }
            if(isset($_SESSION['msg'])) {
                echo Msg::success($_SESSION['msg']);
                unset($_SESSION['msg']);
            }
            if(isset($_GET['id'])) {
                if(filter_var($_GET['id'], FILTER_VALIDATE_INT)!==false)
                $db->oneCar($_GET['id']);
                else echo Msg::err("Invalid ID");
            }
            else echo Msg::info("There is no selected car");
            if(login()) {
                $query = "SELECT * FROM viewcars WHERE car_id = {$_GET['id']} and deleted = 0";
                $res = $db->db->query($query);
                if($res->num_rows == 1)
                $row = $res->fetch_object();
            }
            if(login() && $_SESSION['id'] != $row->users_usr_id) {
                echo "<div id='sendMsg'>
                        <i class='fa-solid fa-envelope fa-2xl' id='msg_box'></i>
                        <p>Write a message to the owner</p>
                    </div>";
            }
            ?>
            <div id="writeMsg">
                <form action="msgsend.php" id="msg_form" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="sender" value="<?= $_SESSION['id'] ?>">
                    <textarea name="txt" id="" placeholder="Write your message"></textarea>
                    <div class="send_btn">
                        <button id="send_btn">SEND</button>
                    </div>
                </form>
                <div class="cancel_msg_btn">
                    <button id="cancel_msg_btn">CANCEL</button>
                </div>
            </div>
        </div>
        <?php 
        
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
            <form action="updatecar.php?id=<?= $row->car_id ?>" method="post" id="edt_form" enctype="multipart/form-data">
                <div>
                    <!--<input type="text" name="make" value="<?= $row->make ?>">
                    <input type="text" name="model" value="<?= $row->model ?>">-->
                    <input type="hidden" name="oldmake" value="<?= $row->make ?>" />
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