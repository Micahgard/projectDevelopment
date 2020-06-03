<?php
/**
 * Author: Micah
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating admission
 */

include_once "../class/Admission.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $description = $_POST['last name'];
    $admissiondate = $_POST['first name'];
    $status = $_POST['street address'];
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
