<?php
function validateString($str) {
    if(strlen($str)<3) return false;
    $nedozvoljeni = array("=", "(", ")", "*", "+"); // " ", 
    foreach($nedozvoljeni as $v)
        if(strpos($str, $v) !== false) return false;
    return true;
}
function login() {
    if(isset($_SESSION['id']) && isset($_SESSION['name'])) return true;
    else if(isset($_COOKIE['id']) && isset($_COOKIE['name'])) {
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['name'] = $_COOKIE['name'];
        $_SESSION['email'] = $_COOKIE['email'];
        $_SESSION['status'] = $_COOKIE['status'];
        return true;
    }
    else return false;
}
?>