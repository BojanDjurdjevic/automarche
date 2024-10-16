<?php
session_start();
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php require_once "components/_header.php" ?>
    <main>
        <?php require_once "components/_searchcar.php" ?>
        <div class="main">
            <div class="usr_div">
                <?php
                if(!login()) {
                    echo Msg::err("You must be loged in!");
                } else {
                    $avatar= (file_exists("avatars/".$_SESSION['id'].".jpg"))? $_SESSION['id'].".jpg" : "noavatar.jpg";
                    echo "<div class='avatarDiv'><img src='avatars/{$avatar}' id='av'/></div>";
                    $query = "SELECT usr_name as name, usr_mail as mail, usr_tel as tel, usr_status as status, 
                    country, city, address 
                    FROM users WHERE usr_id = {$_SESSION['id']}";
                    $res = $db->db->query($query);
                    if($res->num_rows == 1) {
                        $row = $res->fetch_object();
                        echo "  <div class='edit_usr'>
                                    <div class='editBtn'>
                                        <i class='fa-solid fa-user-pen fa-2xl'></i>
                                    </div>
                                    <div class='clsBtn'>
                                        <i class='fa-solid fa-trash-can fa-2xl'></i>
                                    </div>
                                    <div class='edit_form'>
                                        <i class='fa-solid fa-circle-xmark fa-2xl'></i>
                                        <form action='myprofile.php' method='POST'>
                                            <input type='text' name='name' value='{$row->name}'>
                                            <input type='text' name='mail' value='{$row->mail}'>
                                            <input type='text' name='tel' value='{$row->tel}'>
                                            <input type='text' name='country' value='{$row->country}'>
                                            <input type='text' name='city' value='{$row->city}'>
                                            <input type='text' name='address' value='{$row->address}'>
                                            <button>Edit</button>
                                        </form>
                                    </div>
                                </div>
                                <div class='usr_data'>
                                    <h4>Name: {$row->name}</h4>
                                    <p>Status: <b>{$row->status}</b></p>
                                    <p>Email: {$row->mail}</p>
                                    <p>Tel: {$row->tel}</p>
                                    <p>Country: {$row->country}</p>
                                    <p>City: {$row->city}</p>
                                    <p>Address: {$row->address}</p>
                                </div>";
                    } 
                ?>
                
            </div>
            <div class="user_popup">
                <h2>Are you sure you want to cancel your profile?</h2>
                <form action="deleteusr.php" method="POST">
                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />
                    <button id="yes_del_usr">YES</button>
                </form>
                <button id="no_del_usr">NO</button>
            </div>
            <div class="avatarPopup">
                <i class='fa-solid fa-circle-xmark fa-2xl'></i>
                <form action="myprofile.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="avatar" accept="image/*">
                    <button>Change your avatar</button>
                </form>
            </div>
            <div class="err_div">
                <?php
                if(isset($_POST['name'])) {
                    extract($_POST);
                    if($name != "" && $mail != "" && $tel != "" && $country != "" && $city != "" && $address != "") {
                        $db->updateUser($_SESSION['id'], trim($name), trim($mail), trim($tel), trim($country), (trim($city)), trim($address));
                    } else
                    echo Msg::err("All fields must be filled!");
                }
                ?>
            </div>
            <?php
                if(isset($_SESSION['deleted']) && $_SESSION['deleted'] != "") {
                    echo
                    "<div class='cardel_msg'>";
                        echo Msg::success("{$_SESSION['deleted']}");
                    echo "
                        <button class='msg_btn'>OK</button>
                    </div>";
                    $_SESSION['deleted'] = "";
                }
                if(isset($_SESSION['deletedUser']) && $_SESSION['deletedUser'] != "") {
                    echo
                    "<div class='cardel_msg'>";
                        echo Msg::success("{$_SESSION['deletedUser']}");
                    echo "
                        <button class='msg_btn'>OK</button>
                    </div>";
                    $_SESSION['deletedUser'] = "";
                }
            ?>
            <hr>
            <div class="card_view">
                <?php
                if(isset($_SESSION['id'])) {
                    if(filter_var($_SESSION['id'], FILTER_VALIDATE_INT)!==false)
                    $db->myCarsView($_SESSION['id']);
                    else echo Msg::err("Nevalidan ID");
                }
                else echo Msg::info("Setuj ID");
                }
                ?>
            </div>
        </div>
    </main>
    <?php  require_once "components/_footer.php"; ?>
    <script src="./js/index.js"></script>
</body>
</html>