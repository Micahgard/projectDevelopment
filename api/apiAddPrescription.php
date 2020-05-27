<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding prescription
 */

include_once "../class/Prescription.php";

if (isset($_POST["name"])) {
    $prescription = new Prescription(null, $_POST["prescriptiondate"], $_POST["amount"]);
    $prescription->save();
    $msg = "prescription added";
}else{
    $msg = "prescription not added";
}
$msg = json_encode($msg);
echo $msg;