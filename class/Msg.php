<?php
class Msg {
    public static function err($msg) {
        return  "<div>
                    <h6 style='color:red;'>{$msg}</h6>
                </div>";
    }
    public static function success($msg) {
        return  "<div>
                    <h6 style='color:green;'>{$msg}</h6>
                </div>";
    }
    public static function info($msg) {
        return  "<div>
                    <h6 style='color:yellow;'>{$msg}</h6>
                </div>";
    }
}
?>