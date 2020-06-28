<?php
/**
 * Author: Mojeeb
 * Update Micah
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: api for updating prescription
 */

include_once "../class/Prescription.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $prescriptiondate = $_POST['prescriptiondate'];
    $amount = $_POST['amount'];
    $admissionid = $_POST['admissionid'];
    $medicationid = $_POST['medicationid'];
    $prescription = new Prescription($id, $prescriptiondate, $amount, $admissionid, $medicationid);
    $prescription->update();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Prescription has been Successfully Updated!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Prescription has not been Updated!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";