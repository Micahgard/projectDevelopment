<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating prescription
 */

include_once "../class/Prescription.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $lastname = $_POST['prescriptiondate'];
    $firstname = $_POST['amount'];
    $prescription = new Prescription($id, $prescriptiondate, $amount);
    $prescription->update();
    $msg = "prescription updated";
}else{
    $msg = "prescription not updated";
}
$msg = json_encode($msg);
echo $msg;