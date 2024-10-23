<?php
session_start();
require_once "required/_required.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php require_once "components/_header.php" ?>
    <main>
        <div class="main">
            <h2>LOG IN</h2>
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="email@example.com" />
                <input type="password" name="pass" placeholder="Password" />
                <input type="checkbox" name="check" id="check">
                <label for="check">Remember me</label>
                <button>Log in</button>
            </form>
            <div class="gotoreg">
                <p>You don't have any account with us?</p>
                <p>Please go to <a href="reguser.php">Sign up</a></p>
            </div>
            <?php
            if(isset($_POST['email']) && isset($_POST['pass'])) {
                extract($_POST);
                if($email != "" && $pass != "") {
                    if(validateString($email) && validateString($pass)) {
                        $query = "SELECT * FROM users WHERE usr_mail = '{$email}'";
                        $res = $db->db->query($query);
                        if($res->num_rows == 1) {
                            $row = $res->fetch_object();
                            if($pass == $row->usr_pas) { // password_verify($pass, $row->usr_pas)
                                $_SESSION['id'] = $row->usr_id;
                                $_SESSION['name'] = $row->usr_name;
                                $_SESSION['email'] = $row->usr_mail;
                                $_SESSION['status'] = $row->usr_status;
                                if(isset($check)) {
                                    setcookie("id", $_SESSION['id'], time()+10800, "/");
                                    setcookie("name", $_SESSION['name'], time()+10800, "/");
                                    setcookie("email", $_SESSION['email'], time()+10800, "/");
                                    setcookie("status", $_SESSION['status'], time()+10800, "/");
                                }
                                header("location: index.php");
                                exit();
                            } else
                            //echo $pass."<br>".$row->usr_pas;
                            echo Msg::err("The password you have put is incorect for the user: {$email}");
                            //header("location: login.php");
                        } else
                        echo Msg::err("The user with email: {$email} doesn't exist!");
                    } else
                    Msg::err("The data you have put contains forbiden caracters like: +, -, <, > etc.");
                } else
                echo Msg::err("All data must be inserted!");
            }
            ?>
        </div>
    </main>
<?php  require_once "components/_footer.php"; ?>
</body>
</html>