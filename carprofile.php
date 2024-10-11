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
    <div class="bckDiv">
        <i class="fa-regular fa-circle-xmark fa-2xl" id="xmark"></i>
        <i class="fa-solid fa-circle-chevron-left fa-2xl" id="left"></i>
        <i class="fa-solid fa-circle-chevron-right fa-2xl" id="right"></i>
    </div>
    <?php require_once "components/_header.php"; ?>
    <main>
        <div class="main">
            <?php
            if(isset($_GET['id'])) {
                if(filter_var($_GET['id'], FILTER_VALIDATE_INT)!==false)
                $db->oneCar($_GET['id']);
                else echo Msg::err("Nevalidan ID");
            }
            else echo Msg::info("Setuj ID");
            
            ?>
            
        </div>
    </main>
    <?php require_once "components/_footer.php"; ?>
    
    <script src="./js/index.js"></script>
</body>
</html>