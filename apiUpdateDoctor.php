<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating doctor
 */

if (isset($_POST["lastname"])){      /*check the name of doctor if it already existed in database*/
    include_once "../class/Doctor.php";
    $admission = new Doctor(null, $_POST["lastname"], $_POST["firstname"], $_POST["street"], $_POST["suburb"], $_POST["city"], $_POST["specialty"], $_POST["salary"]);
    $admission =save();
    $msg = "new doctor updated";
}else{
    $msg = "doctor already existed";
}
$msg = json_encode($msg);
echo $msg;