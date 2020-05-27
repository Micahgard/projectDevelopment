<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding doctor
 */

include_once "../class/Doctor.php";

if (isset($_POST["name"])) {
    $doctor = new Doctor(null, $_POST["lastname"], $_POST["firstname"], $_POST["street"], $_POST["suburb"], $_POST["city"], $_POST["phone"], $_POST["speciality"], $_POST["salary"]);
    $doctor->save();
    $msg = "doctor added";
}else{
    $msg = "doctor not added";
}
$msg = json_encode($msg);
echo $msg;