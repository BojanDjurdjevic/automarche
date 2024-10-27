<?php
session_start();
require_once "required/_required.php";

if(isset($_POST['msgSub']) and login()) {
    extract($_POST);
    if(validateString($txt)) {
    $qry_msg = "INSERT INTO messages (msg_title, msg_txt, sent_id, rec_id)
    VALUES ('{$msgSub}', '{$txt}', {$sender}, {$receiver})";
    if($db->db->query($qry_msg)) {
        $_SESSION['msg_rep'] = "Your replay was successfully sent!";
        header("location: inbox.php?id={$_SESSION['id']}");
        exit();     
    } else {
        $_SESSION['msg_rep'] = "The message couldn't be sent, please try later!";
        header("location: inbox.php?id={$_SESSION['id']}");
        exit();   
    }
    } else {
        $_SESSION['msg_rep'] = "The text you sent contains forbiden characters!";
        header("location: inbox.php?id={$_SESSION['id']}");
        exit(); 
    }
    
} else {
    $_SESSION['msg_rep'] = "The message couldn't be sent, please try later!";
    header("location: inbox.php?id={$_SESSION['id']}");
    exit(); 
}
?>