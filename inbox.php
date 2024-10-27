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
    <?php require_once "components/_header.php"; 
        if(!login()) {
            header("location: index.php");
            exit();
        }
    ?>
    <main>
    <?php //require_once "components/_searchcar.php";
        if(isset($_SESSION['delmsg'])) {
            echo Msg::err($_SESSION['delmsg']);
            unset($_SESSION['delmsg']);
        }
        if(isset($_SESSION['msg_rep'])) {
            echo Msg::success($_SESSION['msg_rep']);
            unset($_SESSION['msg_rep']);
        }
    ?>
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
            if(isset($_GET['recID']) && filter_var($_GET['recID'], FILTER_VALIDATE_INT) && login()) {
                $query = "SELECT * FROM messages WHERE rec_id = {$_GET['recID']} AND msg_deleted = 0";
                $res = $db->db->query($query);
                if(mysqli_num_rows($res) > 0) {
                    while($row = $res->fetch_object()) {
                        $qry_usr = "SELECT usr_name AS name FROM users WHERE usr_id = {$row->sent_id}";
                        $user = $db->db->query($qry_usr);
                        $usrrow = $user->fetch_object();
                        echo "<div class='rec_msg'>
                                <div class='msg_title'>
                                    <p><b>{$row->msg_title}</b></p>
                                    <p><b>From: {$usrrow->name} | {$row->msg_time}</b></p>
                                </div>
                                <div class='msg_txt'>
                                    <p>"; echo nl2br($row->msg_txt);
                                    echo "</p>
                                </div>
                                <div class='msg_foot'>
                                    <button class='rep' data-id='{$row->msg_id}'>REPLAY</button>
                                    <form action='deletemsg.php' method='post'>
                                        <input type='hidden' name='msgID' value='{$row->msg_id}' />
                                        <button id='no_clr'>CANCEL</button>
                                    </form>
                                </div>
                                <div class='writeMsg' id='{$row->msg_id}'>
                                <form action='reply.php' method='post'>
                                        <input type='hidden' name='msgSub' value='Replay to: {$row->msg_title}' />
                                        <textarea name='txt' placeholder='Write replay'></textarea>
                                        <input type='hidden' name='receiver' value='{$row->sent_id}' />
                                        <input type='hidden' name='sender' value='{$_SESSION['id']}' />
                                        <button class='send_rep' data-id='{$row->msg_id}'>SEND REPLY</button>
                                </form>
                                <button class='no_rep' data-id='{$row->msg_id}'>CANCEL</button>
                                </div>
                            </div>";
                    }
                } else {
                    echo "<div class='rec_succ'>".
                    Msg::success("There is no received messages")
                    . "</div>";
                }
                $query2 = "SELECT * FROM messages WHERE sent_id = {$_GET['recID']} AND msg_deleted = 0";
                $res2 = $db->db->query($query2);
                if(mysqli_num_rows($res2) > 0) {
                    while($row = $res2->fetch_object()) {
                        $qry_usr2 = "SELECT usr_name AS name FROM users WHERE usr_id = {$row->rec_id}";
                        $user2 = $db->db->query($qry_usr2);
                        $usrrow2 = $user2->fetch_object();
                        echo "<div class='sent_msg'>
                                <div class='msg_title'>
                                    <p><b>{$row->msg_title}</b></p>
                                    <p><b>To: {$usrrow2->name} | {$row->msg_time}</b></p>
                                </div>
                                <div class='msg_txt'>
                                    <p>"; echo nl2br($row->msg_txt);
                                    echo "</p>
                                </div>
                                <div class='msg_foot'>
                                    <form action='deletemsg.php' method='post'>
                                        <input type='hidden' name='msgID' value='{$row->msg_id}' />
                                        <button id='no_rep'>CANCEL</button>
                                    </form>
                                </div>
                            </div>";
                    }
                } else {
                    echo "<div class='sent_succ'>".
                    Msg::success("There is no sent messages")
                    . "</div>";
                }
                $query3 = "SELECT * FROM messages WHERE msg_deleted = 1 AND rec_id = {$_GET['recID']} OR sent_id = {$_GET['recID']} AND msg_deleted = 1";
                $res3 = $db->db->query($query3);
                if(mysqli_num_rows($res3) > 0) {
                    while($row = $res3->fetch_object()) {
                        if($row->sent_id == $_SESSION['id']) {
                            $qry_usr = "SELECT usr_name AS name FROM users WHERE usr_id = {$row->rec_id}";
                            $user = $db->db->query($qry_usr);
                            $usrrow = $user->fetch_object();
                            echo "<div class='del_msg'>
                                    <div class='msg_title'>
                                        <p><b>{$row->msg_title}</b></p>
                                        <p><b>To: {$usrrow->name} | {$row->msg_time}</b></p>
                                    </div>
                                    <div class='msg_txt'>
                                        <p>"; echo nl2br($row->msg_txt);
                                        echo "</p>
                                    </div>
                                    <div class='msg_foot'>
                                        <form action='dropmsg.php' method='post'>
                                            <input type='hidden' name='msgID' value='{$row->msg_id}' />
                                            <button id='no_rep'>DELETE</button>
                                        </form>
                                    </div>
                                </div>";
                        } else {
                            $qry_usr2 = "SELECT usr_name AS name FROM users WHERE usr_id = {$row->sent_id}";
                            $user2 = $db->db->query($qry_usr2);
                            $usrrow2 = $user2->fetch_object();
                            echo "<div class='del_msg'>
                                <div class='msg_title'>
                                    <p><b>{$row->msg_title}</b></p>
                                    <p><b>From: {$usrrow2->name} | {$row->msg_time}</b></p>
                                </div>
                                <div class='msg_txt'>
                                    <p>"; echo nl2br($row->msg_txt);
                                    echo "</p>
                                </div>
                                <div class='msg_foot'>
                                    <form action='dropmsg.php' method='post'>
                                        <input type='hidden' name='msgID' value='{$row->msg_id}' />
                                        <button id='no_rep'>DELETE</button>
                                    </form>
                                </div>
                            </div>";
                        }
                    }
                } else {
                    echo "<div class='del_succ'>".
                    Msg::success("There is no deleted messages")
                    . "</div>";
                }
            } else {
                header("location: index.php");
                exit(); 
            }
            
            ?>
            </div>
        </div>
    </main>
    <?php require_once "components/_footer.php"; ?>

    <script src="./js/index.js"></script>
</body>
</html>