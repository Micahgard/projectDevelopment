<?php
/**
 * Author: Mojeeb
 * Update: Micah
 * Date: 27/05/2020
 * Version: 1.1
 * Purpose: api for deleting prescription
 */

include_once "../class/Prescription.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['prescriptionID'])) {
    $prescription = new Prescription($_POST["prescriptionID"], "", "", "", "" );
    $prescription->delete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Prescription has been Successfully Deleted!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Prescription has not been Deleted!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";