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

    // Backup of fnc all:
    /*
    echo "<a href='carprofile.php?id={$row->car_id}' class='card'>
                    <div class='title_div'>
                       <h4>{$row->make} {$row->model}</h4> 
                       <p>{$row->price} EUR</p>
                    </div>
                    <div class='img_div'>";
                    $query2 = "SELECT * FROM pics WHERE car_id = {$row->car_id} AND deleted = 0";
                    $res2 = $this->db->query($query2);
                    if(mysqli_num_rows($res2) > 0) {
                        $r = $res2->fetch_assoc();
                            echo "<img src='images/{$r['pic_name']}' alt='CarImage' width='280px' height='160px'>"; 
                    } else
                    echo "<img src='images/nocar.jpg' width='360'>";
                    echo
                    "</div>
                    <div class='text_div'>
                        <p>Year: {$row->year} </p>
                    </div>
                </a>";
     */

    public function all() {
        $query = "SELECT * FROM viewcars WHERE deleted = 0 ORDER BY car_id DESC";
        $result = $this->db->query($query);    
        while($row = $result->fetch_object()) {
            $query2 = "SELECT * FROM pics WHERE car_id = {$row->car_id} AND deleted = 0";
            $res2 = $this->db->query($query2);
            if(mysqli_num_rows($res2) > 0) {
                $r = $res2->fetch_assoc();
                echo "
                <a href='carprofile.php?id={$row->car_id}' class='card' style='background-image: url(./images/{$r['pic_name']});
                background-position: center; background-repeat: no-repeat; background-size: cover;'>"; 
            } else
            echo "
            <a href='carprofile.php?id={$row->car_id}' class='card' style='background-image: url(./images/nocar.jpg);
            background-position: center; background-repeat: no-repeat; background-size: cover;'>";
            echo "
                    <div class='holder_div'></div>
                    <div class='title_div'>
                       <h4>{$row->make} {$row->model}</h4> 
                       <p>{$row->price} EUR</p>
                    </div>
                    <div class='text_div'>
                        <p><b>Year: {$row->year}</b></p>
                    </div>
                    
                </a>";
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
                        <h3>{$row->price} EUR</h3>";
                        if(isset($_SESSION['id']) && $row->users_usr_id == $_SESSION['id'])
                        echo "<div class='manage_car'>
                              <i class='fa-solid fa-trash-can fa-2xl'></i>
                              <i class='fa-solid fa-user-pen fa-2xl'></i>
                              </div>";
                    echo
                    "</div>
                    <div class='galery'>
                    <div id='imgDivLeft'>
                    <i class='fa-solid fa-angles-left fa-2xl' id='smallLeft'></i>
                    </div>
                    <div class='galery_in'>
                    <i class='fa-solid fa-magnifying-glass fa-2xl' id='magnify'></i>";
                    $query2 = "SELECT * FROM pics WHERE car_id = {$id} AND deleted = 0";
                    $result = $this->db->query($query2);
                    if(mysqli_num_rows($result) > 0) {
                        while($r = $result->fetch_object()) {
                            echo "<img src='images/{$r->pic_name}' alt='CarImage'>";
                        }  
                    } else
                    echo "<img src='images/nocar.jpg' alt='CarImage'>";
                    echo "</div>
                    <div id='imgDivRight'>  
                    <i class='fa-solid fa-angles-right fa-2xl' id='smallRight' ></i>
                    </div>
                    </div>
                    <div class='properties'>
                        <div><p>Make: </p><h4>{$row->make}</h4></div>
                        <div><p>Model: </p><h4>{$row->model}</h4></div>
                        <div><p>Year: </p><h4>{$row->year}</h4></div>
                        <div><p>Kilometers: </p><h4>{$row->km}</h4></div>
                        <div><p>Engine size: </p><h4>{$row->engine}cm3</h4></div>
                        <div><p>Power: </p><h4>{$row->power}ks</h4></div>
                        <div><p>Fuel: </p><h4>{$row->fuel}</h4></div>
                        <div><p>Body type: </p><h4>{$row->body}</h4></div>
                        <div><p>Gear: </p><h4>{$row->gear}</h4></div>
                        <div><p>Number of seats: </p><h4>{$row->seats}</h4></div>
                        <div><p>Number of doors: </p><h4>{$row->doors}</h4></div>
                        <div><p>Color: </p><h4>{$row->color}</h4></div>
                        <div><p>Wheel: </p><h4>{$row->wheel}</h4></div>
                        <div><p>Registration expiry: </p><h4>{$row->regdate}</h4></div>
                        <div><p>Posted on: </p></div>
                        <div><p></p><h4>{$row->created}</h4></div>
                    </div>
                    <hr/>
                    <div class='desc'>
                        <p>{$row->description}</p>
                        <div class='owner'>
                            <h4>Owner: {$row->name}</h4>
                            <h4>City: {$row->city}</h4>
                            <h4>Tel: {$row->usr_tel}</h4>
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
                    <div class='img_div'>";
                    $query2 = "SELECT * FROM pics WHERE car_id = {$row->car_id}";
                    $res2 = $this->db->query($query2);
                    if(mysqli_num_rows($res2) > 0) {
                        $r = $res2->fetch_assoc();
                        echo "<img src='images/{$r['pic_name']}' alt='CarImage' width='360px'>"; 
                    } else
                    echo "<img src='images/nocar.jpg' width='360'>";
                    echo
                    "</div>
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
    public function myCarsView($id) {
        $query = "SELECT * FROM viewcars WHERE users_usr_id = {$id} and deleted = 0";
        $result = $this->db->query($query); 
        if($result->num_rows > 0) {  
        while($row = $result->fetch_object()) {
            $query2 = "SELECT * FROM pics WHERE car_id = {$row->car_id} AND deleted = 0";
            $res2 = $this->db->query($query2);
            if(mysqli_num_rows($res2) > 0) {
                $r = $res2->fetch_assoc();
                echo "
                <a href='carprofile.php?id={$row->car_id}' class='card' style='background-image: url(./images/{$r['pic_name']});
                background-position: center; background-repeat: no-repeat; background-size: cover;'>"; 
            } else
            echo "
            <a href='carprofile.php?id={$row->car_id}' class='card' style='background-image: url(./images/nocar.jpg);
            background-position: center; background-repeat: no-repeat; background-size: cover;'>";
            echo "
                    <div class='holder_div'></div>
                    <div class='title_div'>
                       <h4>{$row->make} {$row->model}</h4> 
                       <p>{$row->price} EUR</p>
                    </div>
                    <div class='text_div'>
                        <p>Year: {$row->year} </p>
                    </div>
                </a>";
        }
        }
        else echo Msg::success("There is no cars posted by you!");
    }
    public function insertCar($usrID, $make, $model, $price, $year, $body,
    $fuel, $power, $engine, $km, $gear, $doors, $seats, $color, $wheel,
    $desc, $reg) {
        $query = "INSERT INTO cars (users_usr_id, make, model, price, year, body,
        fuel, power, engine, km, gear, doors, seats, color, wheel, description,
        regdate) VALUES ({$usrID}, '{$make}', '{$model}', {$price}, {$year}, '{$body}',
        '{$fuel}', {$power}, {$engine}, {$km}, '{$gear}', {$doors}, {$seats}, '{$color}', 
        '{$wheel}', '{$desc}', '{$reg}')";
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
        $query = "UPDATE cars SET users_usr_id = {$usrID}, make = '{$make}', model = '{$model}', 
        price = {$price}, year = {$year}, body = '{$body}', fuel = '{$fuel}', power = {$power}, engine = {$engine}, 
        km = {$km}, gear = '{$gear}', doors = {$doors}, seats = {$seats}, color = '{$color}', 
        wheel = '{$wheel}', description = '{$desc}', regdate = '{$reg}' WHERE car_id = {$id}";
        $this->db->query($query);
        if($this->db && $this->db->query($query)) {
            echo Msg::success("The car {$make} {$model} is succesfully updated");
        } else
        echo Msg::err("The car updating is FAILED!");
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
        usr_tel as tel, usr_status as status FROM users WHERE usr_deleted = 0 AND usr_blocked = 0";
        $res = $this->db->query($query);
        while($row = $res->fetch_object()) {
            $avatar= (file_exists("avatars/".$row->id.".jpg"))? $row->id.".jpg" : "noavatar.jpg";
            echo "<div class='usr'>
                    <div class='manage_usr'>
                        <form action='block.php' method='post'>
                            <input type='hidden' name='id' value='{$row->id}' />
                            <button >Block</button>
                        </form>
                    </div>
                    <div class='small'>
                        <img src='avatars/{$avatar}' id='av_page' />
                    </div>
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
    public function allBlockedUsers() {
        $query = "SELECT usr_id as id, usr_name as name, usr_mail as email,
        usr_tel as tel, usr_status as status FROM users WHERE usr_deleted = 0 AND usr_blocked != 0";
        $res = $this->db->query($query);
        while($row = $res->fetch_object()) {
            $avatar= (file_exists("avatars/".$row->id.".jpg"))? $row->id.".jpg" : "noavatar.jpg";
            echo "<div class='usr'>
                    <div class='manage_usr'>
                        <form action='unblock.php' method='post'>
                            <input type='hidden' name='id' value='{$row->id}' />
                            <button >Unblock</button>
                        </form>
                    </div>
                    <div class='small'>
                        <img src='avatars/{$avatar}' id='av_page' />
                    </div>
                    <div>
                        <p><b>{$row->name} - {$row->status}</b></p>
                    </div>
                    
                    <div>
                        <p>Email: {$row->email}</p>
                        <p>Phone: {$row->tel}</p>
                        <a href='usrprofile.php?id={$row->id}'>See profile</a>
                    </div>
                </div>";
        }
    }
    public function allDelUsers() {
        $query = "SELECT usr_id as id, usr_name as name, usr_mail as email,
        usr_tel as tel, usr_status as status FROM users WHERE usr_deleted != 0";
        $res = $this->db->query($query);
        while($row = $res->fetch_object()) {
            $avatar= (file_exists("avatars/".$row->id.".jpg"))? $row->id.".jpg" : "noavatar.jpg";
            echo "<div class='usr'>
                    <div class='manage_usr'>
                        <form action='restore.php' method='post'>
                            <input type='hidden' name='id' value='{$row->id}' />
                            <button >Restore</button>
                        </form>
                    </div>
                    <div class='small'>
                        <img src='avatars/{$avatar}' id='av_page' />
                    </div>
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
        $qr = "SELECT usr_name as name, usr_mail as email FROM users WHERE usr_name = '{$name}' OR usr_mail = '{$mail}'";
        $res = $this->db->query($qr);
        if(mysqli_num_rows($res) == 0) {
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
            header("location: login.php");
            exit();
        } else {
            while($row = $res->fetch_object()) {
                if($row->name == $name) {
                    echo Msg::err("The user with name: {$name} already exists!");
                } elseif($row->email == $mail) {
                    echo Msg::err("The user with email: {$mail} already exists!");
                }
            }
        }
        
    }
    
    public function updateUser($id, $name, $mail, $tel, $country, $city, $address) {
        $query = "UPDATE users SET usr_name = '{$name}', usr_mail = '{$mail}', usr_tel = '{$tel}', 
        country ='{$country}', city = '{$city}', address = '{$address}'
        WHERE usr_id = {$id}";
        $this->db->query($query);
        if(!$this->db->error && $this->db->query($query)) {
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
    public function usrBlocked() {
        $query = "SELECT usr_blocked FROM users WHERE usr_id = {$_SESSION['id']}";
        $res = $this->db->query($query);
        if($res) {
            $row = $res->fetch_object();
            if($row->usr_blocked != 0) {
                return true;
            } else
            return false;
        }
    }
}
?>