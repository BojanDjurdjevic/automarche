<?php
session_start();
require_once "required/_required.php";

$query = "SELECT * FROM viewcars WHERE car_id = {$_GET['id']} and deleted = 0";
$res = $db->db->query($query);
if($res->num_rows == 1)
$row = $res->fetch_object();

if(isset($_FILES['photos']) && $_FILES['photos']['name'][0] != "") {
    //echo Msg::success("{$row->car_id} and ID of USER is {$_SESSION['id']}");
    //exit();
    for($i = 0; $i < count($_FILES['photos']['name']); $i++) {
        $name = microtime(true)."_".$_FILES['photos']['name'][$i];
        if(@move_uploaded_file($_FILES['photos']['tmp_name'][$i], "images/".$name)) {
            $queryPic = "INSERT INTO pics (car_id, pic_name) VALUES ({$row->car_id}, '{$name}')";
            $db->db->query($queryPic);
        }
    }
} 
if(isset($_POST['make'])) {
    extract($_POST);
    if($make != $oldmake) {
        $str = $make;
        $make = substr($str, 2); 
    }
    
    if($make != "" && $model != "" && $price != "" && $year != "" && $body != "" && $fuel != "" && $power != ""
    && $engine != "" && $km != "" && $gear != "" && $doors != "" && $seats != "" && $color != "" && $wheel != ""
    && $description != "" && $regdate != "") {
        $db->updateCar($row->car_id, $_SESSION['id'], $make, $model, $price, $year, $body, $fuel, $power,
                       $engine, $km, $gear, $doors, $seats, trim($color), $wheel, trim($description), $regdate);
    $_SESSION['carupdate'] = "The car {$row->make} {$row->model} has been successfully updated by user {$_SESSION['name']}!";
    header("Location: carprofile.php?id={$_GET['id']}"); //
    //exit(); 
    } else {
        $_SESSION['carupdate'] ="All fields must be filled!"; 
    } 
}
header("Location: carprofile.php?id={$_GET['id']}");
exit();
?>