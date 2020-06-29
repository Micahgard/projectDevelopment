<?php
/**
 * Author: Micah
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting patient
 */

include_once "../class/Patient.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $patient = new Patient($_POST["id"], "", "", "", "", "", "", "", "");
    $patient->delete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Patient has been Successfully Deleted!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Patient has not been Deleted!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";