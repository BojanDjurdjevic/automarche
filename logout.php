<?php
session_start();
require_once("required/_required.php");
session_unset();
session_destroy();
setcookie("id", $_SESSION['id'], time()-1, "/");
setcookie("podaci", $_SESSION['name'], time()-1, "/");
setcookie("email", $_SESSION['email'], time()-1, "/");
setcookie("status", $_SESSION['status'], time()-1, "/");
header("location: index.php");
?>