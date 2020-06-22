<?php
/**
 * Author: Mojeeb
 * Update: Micah
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: api for adding prescription
 */

include_once "../class/Prescription.php";

if (isset($_POST["name"])) {
    $prescription = new Prescription(null, date("y-m-d"), $_POST["amount"], $_POST["admissionid"], $_POST["medicationid"]);
    $prescription->save();
    $msg = "prescription added";
}else{
    $msg = "prescription not added";
}
$msg = json_encode($msg);
echo $msg;