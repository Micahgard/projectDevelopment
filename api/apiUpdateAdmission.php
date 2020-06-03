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
    $description = $_POST['description'];
    $admissiondate = $_POST['admissiondate'];
    $status = $_POST['status'];
    $admission = new Admission($id, $description, $admissiondate, $status);
    $admission->update();
    $msg = "admission updated";
}else{
    $msg = "admission not updated";
}
$msg = json_encode($msg);
echo $msg;
