<?php
/**
 * Author: Micah
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for updating admission
 */

include_once "../class/Admission.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $admissiondate = $_POST['admissiondate'];
    $status = $_POST['status'];
    $patientID = $_POST['patientID'];
    $wardID = $_POST['wardID'];
    $admission = new Admission($id, $description, $admissiondate, $status, $patientID, $wardID);
    $admission->update();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Admission has been Successfully Updated!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Admission has not been Updated!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";