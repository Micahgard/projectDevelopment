<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating allocation
 */

include_once "../class/Allocation.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $fee = $_POST['fee'];
    $role = $_POST['role'];
    $doctorid = $_POST['doctorid'];
    $admissionid = $_POST['admissionid'];
    $allocation = new Allocation($id, $fee, $role, $doctorid, $admissionid);
    $allocation->update();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Allocation has been Successfully Updated!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Allocation has not been Updated!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";