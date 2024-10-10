<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/92df62f187.js" crossorigin="anonymous"></script>
    <style>
        
    </style>
</head>
<body>
    <header>
        <div class="header">
            <img src="images/left-logo.jpg" alt="logo" class="logo">
            <h2>AUTOMARKET</h2>
            <img src="images/auto_car-14.jpg" alt="logo" class="logo">
        </div>
        <div class="barcont">
            <div class="bar">
                <a href="index.php"><i class="fa-duotone fa-solid fa-house fa-2xl"></i></a>
                <a href="">Search</a>
                <a href="addcar.php">Add a car</a>
                <?php
                if(login()) {
                    echo "<a href='logout.php'>{$_SESSION['name']}</a>";
                } else
                echo "<a href='login.php'>Log in</a>"
                ?>
                
            </div>
        </div>
        
    </header>
    
</body>
</html>