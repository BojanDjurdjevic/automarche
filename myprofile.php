<?php
session_start();
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php require_once "components/_header.php" ?>
    <main>
        <?php require_once "components/_searchcar.php" ?>
        <div class="main">
        <?php
        if(!login()) {
            echo Msg::err("You must be loged in!");
        } else {
            $avatar= (file_exists("avatars/".$_SESSION['id'].".jpg"))? $_SESSION['id'].".jpg" : "noavatar.jpg";
            echo "<div class='avatarDiv'><img src='avatars/{$avatar}' id='av'/></div>";
            if(isset($_SESSION['id'])) {
                if(filter_var($_SESSION['id'], FILTER_VALIDATE_INT)!==false)
                $db->usrCar($_SESSION['id']);
                else echo Msg::err("Nevalidan ID");
            }
            else echo Msg::info("Setuj ID");
        }
        
        ?>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>