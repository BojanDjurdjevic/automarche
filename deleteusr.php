<?php
session_start();
require_once "required/_required.php";

if(isset($_POST['id']) && filter_var(($_POST['id']), FILTER_VALIDATE_INT)) {
    if(login()) { /*
        $query = "SELECT * FROM viewcars WHERE users_usr_id = {$_POST['id']}";
        $res = $db->db->query($query);
        if(mysqli_num_rows($res) > 0) 
        $row = $res->fetch_object(); */
        if($_POST['id'] == $_SESSION['id'] or $_SESSION['status'] == "Admin") {
            $query1 = "UPDATE cars SET deleted = 1 WHERE users_usr_id = {$_POST['id']}";
            $query2 = "UPDATE users SET usr_deleted = 1 WHERE usr_id = {$_POST['id']} AND NOT usr_status = 'Admin'";
            $db->db->query($query2);
            $db->db->query($query1);
            if($db->db->query($query2)) {
                $_SESSION['deletedUser'] = "Your profile is successfully canceled!";
                header("location: logout.php");
            } else { 
                $_SESSION['deletedUser'] = "The removing of your profile is FAILED!";
                header("location: myprofile.php");
            }
        }
    }
} else
header("location: index.php");
?>