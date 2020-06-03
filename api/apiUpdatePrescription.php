<?php
/**
 * Author: Mojeeb
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for updating prescription
 */

include_once "../class/Prescription.php";

if (isset($_POST['prescriptionID'])) {
    $id = $_POST['prescriptionID'];
    $prescriptiondate = $_POST['prescriptiondate'];
    $amount = $_POST['amount'];
    $medicationID = $_POST['medicationID'];
    $admissionID = $_POST['admissionID'];
    $prescription = new Prescription($id, $prescriptiondate, $amount, $medicationID, $admissionID);
    $prescription->update();
    $msg = "prescription updated";
}else{
    $msg = "prescription not updated";
}
$msg = json_encode($msg);
echo $msg;