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
        if(isset($_GET['id'])) {
            if(filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
                $usr_query = "SELECT * FROM users WHERE usr_id = {$_GET['id']} AND usr_deleted = 0";
                $res = $db->db->query($usr_query);
                if(mysqli_num_rows($res) == 1) {
                $avatar= (file_exists("avatars/".$_GET['id'].".jpg"))? $_GET['id'].".jpg" : "noavatar.jpg";
                echo "<div class='avatarDiv'><img src='avatars/{$avatar}' id='av'/></div>";
                    $db->usrCar($_GET['id']);
                } else echo Msg::err("The user with ID {$_GET['id']} doesn't exist!");
            } else
            echo Msg::err("Invalid ID number of user provided!");
        } else 
        echo Msg::err("Please provide an ID or select the real user");
        ?>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>