<?php
session_start();
require_once "required/_required.php";

if(isset($_POST['id']) && filter_var(($_POST['id']), FILTER_VALIDATE_INT)) {
    if(login()) {
        $query = "SELECT users_usr_id as usr_id, make, model FROM cars WHERE car_id = {$_POST['id']}";
        $res = $db->db->query($query);
        if(mysqli_num_rows($res) == 1) 
        $row = $res->fetch_object();
        if($row->usr_id == $_SESSION['id']) {
            $query = "UPDATE cars SET deleted = 1 WHERE car_id = {$_POST['id']}";
            $db->db->query($query);
            if($db->db->query($query)) {
                $_SESSION['deleted'] = "Your car {$row->make} {$row->model} is successfully canceled!";
                header("location: myprofile.php");
            } else { 
                $_SESSION['deleted'] = "The removing of your car {$row->make} {$row->model} is FAILED!";
                header("location: myprofile.php");
            }
        }
    }
} else
header("location: index.php");
?>