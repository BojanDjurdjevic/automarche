<?php
session_start();
require_once "required/_required.php";

if(login() && $_SESSION['status'] == "Admin") {
    if(isset($_POST['id'])) {
        $query = "UPDATE users SET usr_deleted = 0 WHERE usr_id = {$_POST['id']}";
        if($db->db->query($query)) {
            $_SESSION["admin_msg"] = "The user is successfully restored!";
            header("location: admin.php");
            exit(); 
        }
    } else {
        $_SESSION["admin_msg"] = "The user coudn't be restored!";
        header("location: admin.php");
        exit();
    }
} else {
    header("location: index.php");
    exit();
}
?>