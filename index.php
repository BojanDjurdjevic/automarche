<?php
session_start();
require_once "required/_required.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automarket</title>
    <script src="https://kit.fontawesome.com/92df62f187.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php require_once "components/_header.php" ?>
    <main>
        <?php require_once "components/_searchcar.php" ?>
        <div class="main">
            <?php
            if(isset($_SESSION['deletedUser']) && $_SESSION['deletedUser'] != "") {
                echo
                "<div class='cardel_msg'>";
                    echo Msg::success("{$_SESSION['deletedUser']}");
                echo "
                    <button class='msg_btn'>OK</button>
                </div>";
                $_SESSION['deletedUser'] = "";
            }
            $db->all();
            ?>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>