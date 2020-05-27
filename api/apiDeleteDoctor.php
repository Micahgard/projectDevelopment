<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting doctor
 */

include_once "../class/Doctor.php";

if (isset($_GET['id'])) {
    $payment = new Doctor($_GET["id"], "", "", "", "", "", "", "", "");
    $payment->delete();
    $msg = "doctor deleted";
}else{
    $msg = "doctor not deleted";
}
$msg = json_encode($msg);
echo $msg;