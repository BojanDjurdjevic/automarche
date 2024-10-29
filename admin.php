<?php
session_start();
require_once "required/_required.php";

if(login() && $_SESSION['status'] == "Admin") {
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
        <?php require_once "components/_searchcar.php"; 
        if(isset($_SESSION["admin_msg"])) {
            echo Msg::success($_SESSION['admin_msg']);
            unset($_SESSION["admin_msg"]);
        }
        ?>
        <div class="main">
            <div class="srcUser">
                <form action="admin.php" method="POST">
                    <input type="text" name="name" placeholder="Type Username or Email">
                    <button>Search</button>
                </form>
            </div>
            <?php
            if(isset($_POST['name'])) {
                echo "<h3>Your search</h3>";
                $db->searchUser($_POST['name']);
            } else
            ?>
            <div class="all_users">
                <h3>Active users</h3>
                <?php
                $db->allUsers();
                ?>
            </div>
            <div class="blocked_users">
                <h3>Blocked users</h3>
                <?php
                $db->allBlockedUsers();
                ?>
            </div>
            <div class="del_users">
                <h3>Deleted users</h3>
                <?php
                $db->allDelUsers();
                ?>
            </div>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>
<?php
} else {
    header("location: index.php");
    exit();
}
?>