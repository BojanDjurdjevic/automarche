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
}
?>