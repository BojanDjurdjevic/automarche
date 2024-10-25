<?php
require_once "required/_required.php";

if(isset($_GET['brandID']) && $_GET['brandID'] != "" 
    && filter_var($_GET['brandID'], FILTER_VALIDATE_INT)) {
        $id = $_GET['brandID'];
        $query2 = "SELECT * FROM models WHERE brand_id = {$id}";
        $res = $db->db->query($query2);
        if(mysqli_num_rows($res) > 0) {
        $arr = [];
        while($row = $res->fetch_object()) {
                array_push($arr, $row->model_name);
            }
        } 
        $output = [
            "models" => $arr
        ];
        echo json_encode($output, JSON_PRETTY_PRINT);
    }
?>