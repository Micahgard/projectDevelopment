<?php
/**
 * Author: Mojeeb
 * Update Micah
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: api for updating prescription
 */

include_once "../class/Prescription.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $prescriptiondate = $_POST['prescriptiondate'];
    $amount = $_POST['amount'];
    $admissionid = $_POST['admissionid'];
    $medicationid = $_POST['medicationid'];
    $prescription = new Prescription($id, $prescriptiondate, $amount, $admissionid, $medicationid);
    $prescription->update();
    $msg = "prescription updated";
}else{
    $msg = "prescription not updated";
}
$msg = json_encode($msg);
echo $msg;