<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding allocation
 */

include_once "../class/Allocation.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["doctorID"])) {
    $allocation = new Allocation(null, $_POST["fee"], $_POST["role"], $_POST["doctorID"], $_POST["admissionID"]);
    $allocation->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Allocation has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Allocation has not been Added!</div>
        <script>notificationGoBack();</script><?php
}
include_once "../pages/foot.php";