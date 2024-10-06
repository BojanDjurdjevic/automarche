<?php
$db = new mysqli("localhost", "root", "", "automarket");
if(!$db) {
    echo "Došlo je do greške prilikom konekcije na bazu!";
    exit();
}
?>