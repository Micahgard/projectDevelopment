<?php
/**
 * Author: Micah
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for updating admission
 */

include_once "../class/Admission.php";

if (isset($_POST['admissionID'])) {
    $id = $_POST['admissionID'];
    $description = $_POST['description'];
    $admissiondate = $_POST['admissiondate'];
    $status = $_POST['status'];
    $patientID = $_POST['patientID'];
    $wardID = $_POST['wardID'];
    $admission = new Admission($id, $description, $admissiondate, $status, $patientID, $wardID);
    $admission->update();
    $msg = "admission updated";
}else{
    $msg = "admission not updated";
}
$msg = json_encode($msg);
echo $msg;
