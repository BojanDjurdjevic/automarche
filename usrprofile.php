<?php
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <?php
    $slika= (file_exists("avatars/".$_GET['id'].".jpg"))? $_GET['id'].".jpg" : "noavatar.jpg";
    echo "<div class='avatarDiv'><img src='avatars/{$slika}' id='av'/></div>";
    if(isset($_GET['id'])) {
        if(filter_var($_GET['id'], FILTER_VALIDATE_INT)!==false)
        $db->usrCar($_GET['id']);
        else echo Msg::err("Nevalidan ID");
    }
    else echo Msg::info("Setuj ID");
    ?>
</body>
</html>