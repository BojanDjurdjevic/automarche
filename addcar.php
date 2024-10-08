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
            ?>
            
        </div>
    </main>

    <?php require_once "components/_footer.php"; ?>
    
</body>
</html>
