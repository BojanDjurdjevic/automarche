<?php
class Database {
    public $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "automarket");
        if(!$this->db) {
            echo "Greška pri konekciji na bazu";
            exit();
        }

    }
    public function all() {
        $query = "SELECT * FROM cars WHERE deleted = 0";
        $result = $this->db->query($query);    
        while($row = $result->fetch_object()) {
            echo "<a href='carprofile.php?id={$row->car_id}'><div class='car_div'>
                    <div class='img_div'>
                        <img src='images/sport-car.jpg' width='300'>
                    </div>
                    <div class='txt_div'>
                        <h4>{$row->make} {$row->model}</h4>
                        <p>{$row->year}</p>
                        <p>{$row->fuel}</p>
                        <p>{$row->price} EUR</p>
                    </div>
                <div></a>";
        }
    }
    public function oneCar($id) {
        $query = "SELECT * FROM cars WHERE car_id = {$id} and deleted = 0";
        $res = $this->db->query($query);
        if($res->num_rows == 1)
        while($row = $res->fetch_object()) {
            echo $row->make. " ". $row->model;
        }
        else header("location: index.php");
    }
    public function usrCar($id) {
        $query = "SELECT * FROM cars WHERE users_usr_id = {$id} and deleted = 0";
        $res = $this->db->query($query);
        if($res->num_rows > 0)
        while($row = $res->fetch_object()) {
            echo $row->make. " ". $row->model;
        }
        else echo Msg::success("There is no cars posted by user with ID: {$id}");
    }
    public function insertCar($usrID, $make, $model, $price, $year, $body,
    $fuel, $power, $engine, $km, $gear, $doors, $seats, $color, $wheel,
    $desc, $reg) {
        $query = "INSERT INTO cars (users_usr_id, make, model, price, year, body,
        fuel, power, engine, km, gear, doors, seats, color, wheel, description,
        regdate VALUES ({$usrID}, '{$make}', '{$model}', {$price}, {$year}, '{$body}',
        '{$fuel}', {$power}, {$engine}, {$km}, '{$gear}', {$doors}, {$seats}, '{$color}', 
        '{$wheel}', '{$desc}', {$reg})";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The new car {$make} {$model} is succesfully added in database");
        } else
        echo Msg::err("The car adding is FAILED!");

    }
    public function updateCar() {

    }
    public function deleteCar($id) {
        $query = "UPDATE cars SET deleted = 1 WHERE car_id = {$id}";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The new car is succesfully removed from the App");
        } else
        echo Msg::err("The car removing is FAILED!");
    }
}
?>