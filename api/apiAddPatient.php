<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding patient
 */

include_once "../class/Patient.php";

if (isset($_POST["lastname"])) {
    $patient = new patient(null, $_POST["lastname"], $_POST["firstname"], $_POST["street"], $_POST["suburb"], $_POST["city"],
        $_POST["email"], $_POST["phone"], $_POST["insurcode"]);
    $patient->save();
    $msg = "patient added";
}else{
    $msg = "patient not added";
}
$msg = json_encode($msg);
echo $msg;