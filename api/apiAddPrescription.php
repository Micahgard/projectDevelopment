<?php
/**
 * Author: Mojeeb
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for adding prescription
 */

include_once "../class/Prescription.php";

if (isset($_POST["amount"])) {
    $prescription = new Prescription(null, $_POST["prescriptiondate"], $_POST["amount"], $_POST["medicationID"], $_POST["admissionID"]);
    $prescription->save();
    $msg = "prescription added";
}else{
    $msg = "prescription not added";
}
$msg = json_encode($msg);
echo $msg;