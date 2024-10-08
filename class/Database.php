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
        $query = "SELECT * FROM viewcars WHERE deleted = 0";
        $result = $this->db->query($query);    
        while($row = $result->fetch_object()) {
            echo "<a href='carprofile.php?id={$row->car_id}' id='link'><div class='car_div'>
                    <div class='img_div'>
                        <img src='images/sport-car.jpg' width='300'>
                    </div>
                    <div class='txt_div'>
                        <h4>{$row->make} {$row->model}</h4>
                        <p>Year: {$row->year}</p>
                        <p>Fuel: {$row->fuel}</p>
                        <p>{$row->price} EUR</p>
                    </div>
                </div></a>";
        }
    }
    public function oneCar($id) {
        $query = "SELECT * FROM viewcars WHERE car_id = {$id} and deleted = 0";
        $res = $this->db->query($query);
        if($res->num_rows == 1)
        while($row = $res->fetch_object()) {
            echo $row->make. " ". $row->model;
        }
        else header("location: index.php");
    }
    public function usrCar($id) {
        $query = "SELECT * FROM viewcars WHERE users_usr_id = {$id} and deleted = 0";
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
        regdate) VALUES ({$usrID}, '{$make}', '{$model}', {$price}, {$year}, '{$body}',
        '{$fuel}', {$power}, {$engine}, {$km}, '{$gear}', {$doors}, {$seats}, '{$color}', 
        '{$wheel}', '{$desc}', {$reg})";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The new car {$make} {$model} is succesfully added in database");
        } else
        echo Msg::err("The car adding is FAILED!");

    }
    public function updateCar($id, $usrID, $make, $model, $price, $year, $body,
        $fuel, $power, $engine, $km, $gear, $doors, $seats, $color, $wheel,
        $desc, $reg) {
        $query = "UPDATE cars SET (users_usr_id, make, model, price, year, body,
        fuel, power, engine, km, gear, doors, seats, color, wheel, description,
        regdate) VALUES ({$usrID}, '{$make}', '{$model}', {$price}, {$year}, '{$body}',
        '{$fuel}', {$power}, {$engine}, {$km}, '{$gear}', {$doors}, {$seats}, '{$color}', 
        '{$wheel}', '{$desc}', {$reg}) 
        WHERE car_id = {$id}";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The car {$make} {$model} is succesfully updated");
        } else
        echo Msg::err("The car removing is FAILED!");
    }
    public function deleteCar($id) {
        $query = "UPDATE cars SET deleted = 1 WHERE car_id = {$id}";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The car is succesfully removed from the App");
        } else
        echo Msg::err("The car removing is FAILED!");
    }
    // USERS
    public function allUsers() {
        $query = "SELECT usr_id as id, usr_name as name, usr_mail as email,
        usr_tel as tel, usr_status as status FROM users WHERE usr_deleted = 0";
        $res = $this->db->query($query);
        while($row = $res->fetch_object()) {
            echo "<div class='usr'>
                    <div>
                        <h3>{$row->name} - {$row->status}</h3>
                    </div>
                    <div>
                        <p>Email: {$row->email}</p>
                        <p>Phone: {$row->tel}</p>
                        <a href='usrprofile.php?id={$row->id}'>See profile</a>
                    </div>
                </div>";
        }
    }
    public function findUser($id) {
        $query = "SELECT usr_id as id, usr_name as name, usr_mail as email,
        usr_tel as tel, usr_status as status FROM users WHERE usr_deleted = 0 and usr_id = $id";
        $res = $this->db->query($query);
        while($row = $res->fetch_object()) {
            echo "<div class='usr'>
                    <div>
                        <h3>{$row->name} - {$row->status}</h3>
                    </div>
                    <div>
                        <p>Email: {$row->email}</p>
                        <p>Phone: {$row->tel}</p>
                        <a href='usrprofile.php?id={$row->id}'>See profile</a>
                    </div>
                </div>";
        }
    }
    public function createUser($name, $mail, $pass, $tel, $status) {
        $query = "INSERT INTO users (usr_name, usr_mail, usr_pas, usr_tel, usr_status)
        VALUES ('{$name}', '{$mail}', '{$pass}', '{$tel}', '{$status}')";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The new user {$name} is succesfully created");
        } else
        echo Msg::err("The creating of user is FAILED!");
    }
    public function updateUser($id, $name, $mail, $pass, $tel, $status) {
        $query = "UPDATE cars SET (usr_name, usr_mail, usr_pas, usr_tel, usr_status) 
        VALUES ('{$name}', '{$mail}', '{$pass}', '{$tel}', '{$status}') 
        WHERE usr_id = {$id}";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The user {$name} is succesfully updated");
        } else
        echo Msg::err("The editing of user {$name} is FAILED!");
    }
    public function deleteUser($id) {
        $query = "UPDATE users SET usr_deleted = 1 WHERE usr_id = {$id}";
        $this->db->query($query);
        if(!$this->db && $this->db->query($query)) {
            echo Msg::success("The user succesfully removed from the App");
        } else
        echo Msg::err("The user removing is FAILED!");
    }
}
?>