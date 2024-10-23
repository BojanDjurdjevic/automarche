<?php
session_start();
require_once "required/_required.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Member</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php require_once "components/_header.php" ?>
    <main>
        <div class="main">
            <h2>Sign Up</h2>
            <form action="reguser.php" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="email@example.com">
                <input type="password" name="pass" placeholder="Password">
                <input type="text" name="tel" placeholder="Phone number">
                <?php
                    if(login() && $_SESSION['status'] == "Admin")
                    echo "<select name='status' id='status'>
                            <option value='0'>--Chose the user's role--</option>
                            <option value='User'>User</option>
                            <option value='Editor'>Editor</option>
                            <option value='Admin'>Admin</option>
                         </select>";
                    else
                    echo "<input type='hidden' name='status' value='User'>";
                ?>
                
                <input type="text" name="country" placeholder="Country">
                <input type="text" name="city" placeholder="City">
                <input type="text" name="address" placeholder="Address">
                <div class="photo_add">
                    <label for="pht"><b>Add your avatar:</b></label>
                    <input type="file" name="avatar" id="pht" accept="image/*">
                </div>
                <button>Add new user</button>
            </form>
            <?php
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['tel'])
                && isset($_POST['status']) && isset($_POST['country']) && isset($_POST['city'])) {
                    extract($_POST);
                    if(validateString($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && validateString($pass) //
                    && validateString($tel) && validateString($country) && validateString($city)
                    && validateString($address)) { // password_hash($pass, PASSWORD_DEFAULT)
                        //$hashed = password_hash($pass, PASSWORD_DEFAULT);
                        $db->createUser($name, $email, $pass, $tel, $status, $country, $city, $address);
                    } else
                    echo Msg::err("All user data should be correctly set!");
                }
            ?>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>