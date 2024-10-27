<?php
session_start();
require_once "required/_required.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once "components/_header.php"; ?>
    <main>
        <?php require_once "components/_searchcar.php" ?>
        <div class="main">
            <div class="tab">
                <div class="received_tab">
                    <p>RECEIVED</p>
                </div>
                <div class="sent_tab">
                    <p>SENT</p>
                </div>
                <div class="del_tab">
                    <p>DELETED</p>
                </div>
            </div>
            <div id="msg_view">
            <?php
            if(isset($_GET['recID']) && filter_var($_GET['recID'], FILTER_VALIDATE_INT)) {
                $query = "SELECT * FROM messages WHERE rec_id = {$_GET['recID']} AND msg_deleted = 0";
                $res = $db->db->query($query);
                if(mysqli_num_rows($res) > 0) {
                    while($row = $res->fetch_object()) {
                        echo "<div class='rec_msg'>
                                <div class='msg_title'>
                                    <p><b>{$row->msg_title}</b></p>
                                    <p><b>{$row->sent_id} {$row->msg_time}</b></p>
                                </div>
                                <div class='msg_txt'>
                                    <p>{$row->msg_txt}</p>
                                </div>
                                <div class='msg_foot'>
                                    <button id='rep'>REPLAY</button>
                                    <button id='no_rep'>CANCEL</button>
                                </div>
                            </div>";
                    }
                } else
                echo Msg::success("There is no received messages");
            } else
            header("location: index.php");
            exit();
            ?>
            </div>
        </div>
    </main>
    <?php require_once "components/_footer.php"; ?>

    <script src="./js/index.js"></script>
</body>
</html>