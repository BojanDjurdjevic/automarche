<?php
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once "components/_header.php"; ?>
    <main>
        <?php
        if(isset($_GET['id'])) {
            if(filter_var($_GET['id'], FILTER_VALIDATE_INT)!==false)
            $db->oneCar($_GET['id']);
            else echo Msg::err("Nevalidan ID");
        }
        else echo Msg::info("Setuj ID");
        
        ?>
    </main>
    <?php require_once "components/_footer.php"; ?>
</body>
</html>