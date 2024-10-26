<?php
class Msg {
    public static function err($msg) {
        return  "<div class='mymsg'>
                    <h3 style='color:red;'>{$msg}</h3>
                    <button id='res-btn'>OK</button>
                </div>";
    }
    public static function success($msg) {
        return  "<div class='mymsg'>
                    <h3 style='color:green;'>{$msg}</h3>
                    <button id='res-btn'>OK</button>
                </div>";
    }
    public static function info($msg) {
        return  "<div class='mymsg'>
                    <h3 style='color:yellow;'>{$msg}</h3>
                    <button id='res-btn'>OK</button>
                </div>";
    }
}
?>