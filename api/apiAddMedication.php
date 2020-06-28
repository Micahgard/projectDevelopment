<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding medication
 */

include_once "../class/Medication.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["name"])) {
    $ward = new Medication(null, $_POST["name"], $_POST["cost"]);
    $ward->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Medication has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Medication has not been Added!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";