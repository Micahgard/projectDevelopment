<?php
/**
 * Author: Joel
 * Date: 26/05/2020
 * Version: 1.1
 * Purpose: api for adding ward
 */

include_once "../class/Ward.php";

if (isset($_POST["name"])) {
    $ward = new Ward(null, $_POST["name"], $_POST["location"], $_POST["capacity"]);
    $ward->save();
    $msg = "ward added";
}else{
    $msg = "ward not added";
}
$msg = json_encode($msg);
echo $msg;