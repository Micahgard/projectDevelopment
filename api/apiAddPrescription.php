<?php
/**
 * Author: Mojeeb
 * Update: Micah
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: api for adding prescription
 */

include_once "../class/Prescription.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["medicationID"])) {
    $prescription = new Prescription(null, date("y-m-d"), $_POST["amount"], $_POST["admissionID"], $_POST["medicationID"]);
    $prescription->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Prescription has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Prescription has not been Added!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";