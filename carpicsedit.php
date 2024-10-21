<?php
session_start();
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My car photos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once "components/_header.php"; ?>
    <main>
        <?php require_once "components/_searchcar.php" ?>
        <div class="main">
            <h2>Please select the car images to remove</h2>
            <div class="car_img_view">
            <?php
                if(isset($_GET['id'])) {
                    if(filter_var($_GET['id'], FILTER_VALIDATE_INT)!==false) {
                        $query = "SELECT * FROM pics WHERE car_id = {$_GET['id']} AND pics.deleted = 0"; 
                        $res = $db->db->query($query);
                        if(mysqli_num_rows($res) > 0) {
                            while($row = $res->fetch_object()) {
                                echo "<div class='one_img'><img src='images/{$row->pic_name}' alt='CarImage' id='{$row->pic_id}' width='210px'></div>";
                            }
                        } else 
                        echo Msg::success("There is no pictures posted for this car");
                    }
                    else echo Msg::err("Invalid ID");
                }
                else echo Msg::info("There is no selected carID");

                if(isset($_POST['picarr']) && $_POST['picarr'] != "") {
                    $str = $_POST['picarr'];
                    $arr = explode(",", $str);
                    $prepare = "UPDATE pics SET pics.deleted = 1 WHERE ";
                    for($i = 0; $i < count($arr); $i++) {
                        $prepare = $prepare."pic_id = {$arr[$i]} OR ";
                    }
                    $prepare = substr($prepare, 0, -4);
                    $prepare = trim($prepare);
                    /*
                    var_dump($prepare); // No rows afected
                    exit();
                    */
                    $db->db->query($prepare);
                    if($db->db->query($prepare)) {
                        echo Msg::success("Car images successfully removed!");
                        echo "<button id='confirm'><a href='carprofile.php?id={$_GET['id']}'>OK</a></button>";
                    }
                }

                if(isset($_POST['restore']) && $_POST['restore'] != "") {
                    $restore = "UPDATE pics SET pics.deleted = 0 WHERE pics.car_id = {$_POST['restore']}";
                    $db->db->query($restore);
                    if($db->db->query($restore)) {
                        echo Msg::success("Car images are successfully restored!");
                        echo "<button id='confirm'><a href='carprofile.php?id={$_GET['id']}'>OK</a></button>";
                    }
                }
            ?>
            <form action="carpicsedit.php?id= <?= $_GET['id'] ?>" method="POST" >
                <input type="hidden" name="picarr" id="picarr" />
                <button>REMOVE</button>
            </form>
            </div>
            <div class="restore">
                <p>Restore all images of this car</p>
                <form action="carpicsedit.php?id= <?= $_GET['id'] ?>" method="POST" >
                    <input type="hidden" name="restore" value="<?= $_GET['id'] ?>" />
                    <button>RESTORE</button>
                </form>
            </div>
        </div>
    </main>
    <?php require_once "components/_footer.php"; ?>

    <script src="./js/index.js"></script>
</body>
</html>