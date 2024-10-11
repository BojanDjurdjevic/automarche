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
                    <div class='txt_div'>
                        <h4>Saler: {$row->name}</h4>
                        <p>Country: {$row->country}</p>
                        <p>City: {$row->city}</p>
                        <p>Address: {$row->address} </p>
                        <p>Tel: {$row->usr_tel}</p>

                    </div>
                </div></a>";
        }
    }
    public function oneCar($id) {
        $query = "SELECT * FROM viewcars WHERE car_id = {$id} and deleted = 0";
        $res = $this->db->query($query);
        if($res->num_rows == 1)
        while($row = $res->fetch_object()) {
            //echo $row->make. " ". $row->model;
            //$date = date("Y.m.d H:i:s", intval($row->created));
            echo "<div class='carprofile'>
                    <div class='car_title'>
                        <h2>{$row->make} {$row->model}</h2>
                        <h3>{$row->price} EUR</h3>
                    </div>
                    <div class='galery'>";
                    $query2 = "SELECT * FROM pics WHERE car_id = {$id}";
                    $result = $this->db->query($query2);
                    if(mysqli_num_rows($result) > 0) {
                        while($r = $result->fetch_object()) {
                            echo "<img src='images/{$r->pic_name}' alt='CarImage'>";
                        }  
                    } else
                    echo "<img src='images/sport-car2.jpg' alt='CarImage'>";
                    echo    
                    "</div>
                    <div class='properties'>
                        <h6>Make:</h6>
                        <h6>{$row->make}</h6>
                        <h6>Model:</h6>
                        <h6>{$row->model}</h6>
                        <h6>Year:</h6>
                        <h6>{$row->year}</h6>
                        <h6>Kilometers:</h6>
                        <h6>{$row->km}km</h6>
                        <h6>Engine size:</h6>
                        <h6>{$row->engine}cm3</h6>
                        <h6>Power:</h6>
                        <h6>{$row->power}ks</h6>
                        <h6>Fuel:</h6>
                        <h6>{$row->fuel}</h6>
                        <h6>Body type:</h6>
                        <h6>{$row->body}</h6>
                        <h6>Gear:</h6>
                        <h6>{$row->gear}</h6>
                        <h6>Number of seats:</h6>
                        <h6>{$row->seats}</h6>
                        <h6>Number of doors:</h6>
                        <h6>{$row->doors}</h6>
                        <h6>Color:</h6>
                        <h6>{$row->color}</h6>
                        <h6>Wheel:</h6>
                        <h6>{$row->wheel}</h6>
                        <h6>Registration expiry:</h6>
                        <h6>{$row->regdate}</h6>
                        <h6>Posted on:</h6>
                        <h6>{$row->created}</h6>
                    </div>
                    <div class='desc'>
                        <p>{$row->description}</p>
                        <div>
                            <h6>Owner: {$row->name}</h6>
                            <h6>City: {$row->city}</h6>
                            <h6>Tel: {$row->usr_tel}</h6>
                            <a href='usrprofile.php?id={$row->users_usr_id}'>See the owners profile</a>
                        </div>
                    </div>
                </div>";
        }
        else header("location: index.php");
    }
    public function usrCar($id) {
        $query = "SELECT * FROM viewcars WHERE users_usr_id = {$id} and deleted = 0";
        $res = $this->db->query($query);
        if($res->num_rows > 0)
        while($row = $res->fetch_object()) {
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
                    <div class='txt_div'>
                        <h4>Saler: {$row->name}</h4>
                        <p>Country: {$row->country}</p>
                        <p>City: {$row->city}</p>
                        <p>Address: {$row->address} </p>
                        <p>Tel: {$row->usr_tel}</p>

                    </div>
                </div></a>";
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
        echo Msg::success("The new car {$make} {$model} is succesfully added in database");
        $carID = mysqli_insert_id($this->db);
        if($_FILES['photos']['name'][0] != "") {
            for($i = 0; $i < count($_FILES['photos']['name']); $i++) {
                $name = microtime(true)."_".$_FILES['photos']['name'][$i];
                if(@move_uploaded_file($_FILES['photos']['tmp_name'][$i], "images/".$name)) {
                    $query = "INSERT INTO pics (car_id, pic_name) VALUES ({$carID}, '{$name}')";
                    $this->db->query($query);
                }
            }
        }
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
    public function createUser($name, $mail, $pass, $tel, $status, $country, $city, $address) {
        $query = "INSERT INTO users (usr_name, usr_mail, usr_pas, usr_tel, usr_status, country, city, address)
        VALUES ('{$name}', '{$mail}', '{$pass}', '{$tel}', '{$status}', '{$country}', '{$city}', '{$address}')";
        $this->db->query($query);
            echo Msg::success("The new user {$name} is succesfully created");
            if(isset($_FILES['avatar']) && $_FILES['avatar']['name']!="") {
                $name = mysqli_insert_id($this->db) .".jpg";
                if(@move_uploaded_file($_FILES['avatar']['tmp_name'], "avatars/".$name)) {
                    echo Msg::success("Succesfully uploaded avatar!");
                }
                else echo Msg::err("Avatar upload FAILED!");
            }
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