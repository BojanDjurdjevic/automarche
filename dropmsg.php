<?php
session_start();
require_once "required/_required.php";

if(isset($_POST['msgID']) && filter_var($_POST['msgID'], FILTER_VALIDATE_INT)) {
    $query = "UPDATE messages SET msg_deleted = 2 WHERE msg_id = {$_POST['msgID']}";
    if($res = $db->db->query($query)) {
        header("location: inbox.php?recID={$_SESSION['id']}");
        exit();
    } else {
        $_SESSION['delmsg'] = "The message couldn't be canceled!";
        header("location: inbox.php?recID={$_SESSION['id']}");
        exit();
    }
} else {
    header("location: index.php");
    exit();
}
?>