<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding medication
 */

include_once "../class/Medication.php";

if (isset($_POST["name"])) {
    include_once "../class/Medication.php";
    $ward = new Medication(null, $_POST["name"], $_POST["cost"]);
    $ward->save();
    $msg = "medication added";
}else{
    $msg = "medication not added";
}
$msg = json_encode($msg);
echo $msg;