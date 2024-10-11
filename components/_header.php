<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/92df62f187.js" crossorigin="anonymous"></script>  
</head>
<body>
    <header>
        <div class="manage">
            <a href="myprofile.php">My profile</a>
            <a href="logout.php">Log out</a>
        </div>
        <div class="header">
            <img src="images/left-logo.jpg" alt="logo" class="logo">
            <h2>AUTOMARKET</h2>
            <img src="images/auto_car-14.jpg" alt="logo" class="logo">
        </div>
        <div class="barcont">
            <div class="bar">
                <a href="index.php"><i class="fa-duotone fa-solid fa-house fa-2xl"></i></a>
                <a id="find">Search</a>
                <a href="addcar.php">Add a car</a>
                <?php
                if(login()) {
                    $avatar= (file_exists("avatars/".$_SESSION['id'].".jpg"))? $_SESSION['id'].".jpg" : "noavatar.jpg";
                    echo "  <div class='small'>
                            <p>{$_SESSION['name']}</p>
                            <img src='avatars/{$avatar}' id='av_page' />
                            </div>";
                } else
                echo "<a href='login.php'>Log in</a>"
                ?>
                
            </div>
        </div>
        
    </header>
</body>
</html>