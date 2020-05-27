<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting doctor
 */

include_once "../class/Doctor.php";

if (isset($_GET['id'])) {
    $doctor = new Doctor($_GET["id"], "", "", "", "", "", "", "", "");
    $doctor->delete();
    $msg = "doctor deleted";
}else{
    $msg = "doctor not deleted";
}
$msg = json_encode($msg);
echo $msg;