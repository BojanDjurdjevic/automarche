<?php
class Database {
    public $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "automarket");
        if(!$this->db) {
            echo "Greška prikonekciji na bazu";
            exit();
        } else
        echo "Pozdrav iz baze";

    }

    public function query($query) {
        $this->db->query($query);
    }
}
?>