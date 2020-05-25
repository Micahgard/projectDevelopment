<?php
/**
 * Author: Joel
 * Date: 25/05/2020
 * Version: 1.0
 * Purpose: api for adding ward
 */

if (isset($_POST["name"])){       /* check the name of ward if it already existed in database */
    include_once "../class/Ward.php";
    $ward = new Ward(null, $_POST["name"], $_POST["location"], $_POST["capacity"]);
    $ward->save();
    $msg = "new ward added";
}else{
    $msg = "ward already existed";
}
$msg = json_encode($msg);
echo $msg;