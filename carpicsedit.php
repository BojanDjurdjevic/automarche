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
            <div class="car_img_view">
            <?php
                if(isset($_GET['id'])) {
                    if(filter_var($_GET['id'], FILTER_VALIDATE_INT)!==false) {
                        $query = "SELECT * FROM pics WHERE car_id = {$_GET['id']} AND pics.deleted = 0"; 
                        $res = $db->db->query($query);
                        if(mysqli_num_rows($res) > 0) {
                            while($row = $res->fetch_object()) {
                                echo "<div class='one_img'><img src='images/{$row->pic_name}' alt='CarImage' width='210px'></div>";
                            }
                        } else 
                        echo Msg::success("There is no pictures posted for this car");
                    }
                    else echo Msg::err("Invalid ID");
                }
                else echo Msg::info("There is no selected carID");

                if(isset($_POST['picarr']) && $_POST['picarr'] != "") {
                    var_dump($_POST['picarr']);
                } else
                echo Msg::success("There is no selected images to remove");
            ?>
            <form action="carpicsedit.php?id= <?= $_GET['id'] ?>" method="POST" >
                <input type="hidden" name="picarr" id="picarr" />
                <button>REMOVE</button>
            </form>
            </div>
        </div>
    </main>
    <?php require_once "components/_footer.php"; ?>

    <script src="./js/index.js"></script>
</body>
</html>