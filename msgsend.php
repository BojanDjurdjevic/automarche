<?php
session_start();
require_once "required/_required.php";
if($db->usrBlocked() != true) {
    if(isset($_POST['id']) and filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        extract($_POST);
        if(validateString($txt)) {
        $query = "SELECT car_id, make, model, users_usr_id as receiver FROM viewcars WHERE car_id = {$id} and deleted = 0";
        $res = $db->db->query($query);
        if($res->num_rows == 1)
        $row = $res->fetch_object();
        $qry_msg = "INSERT INTO messages (msg_title, msg_txt, sent_id, rec_id)
        VALUES ('Question about your car {$row->make} {$row->model}', '{$_POST['txt']}', {$_POST['sender']}, {$row->receiver})";
        if($db->db->query($qry_msg)) {
            $_SESSION['msg'] = "Your message was successfully sent to the car owner";
            header("location: carprofile.php?id={$id}");
            exit();     
        } else {
            $_SESSION['msg'] = "The message couldn't be sent, please try later!";
            header("location: carprofile.php?id={$id}");
            exit();   
        }
        } else {
            $_SESSION['msg'] = "The text you sent contains forbiden characters!";
            header("location: carprofile.php?id={$id}");
            exit();   
        }
        
    } else {
        $_SESSION['msg'] = "The message couldn't be sent, please try later!";
        header("location: carprofile.php?id={$id}");
        exit();   
    } 
} else {
    $_SESSION['msg'] = "You are unauthorized to send a message, please send your unlock-request to the admin by clicking on button 'Unlock me' on your profile";
    header("location: carprofile.php?id={$_POST['id']}");
    exit();  
}
?>