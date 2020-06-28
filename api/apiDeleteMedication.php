<?php
/**
 * Author: Joel
 * Date: 02/06/2020
 * Version: 1.0
 * Purpose: api for deleting medication
 */

include_once "../class/Medication.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_GET['id'])) {
    $medication = new Medication($_GET["id"], "", "");
    $medication->delete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Medication has been Successfully Deleted!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Medication has not been Deleted!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";
