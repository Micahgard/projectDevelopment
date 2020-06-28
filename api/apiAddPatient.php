<?php
/**
 * Author: Joel
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding patient
 */

include_once "../class/Patient.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["lastname"])) {
    $patient = new Patient(null, $_POST["lastname"], $_POST["firstname"], $_POST["street"], $_POST["suburb"], $_POST["city"],
        $_POST["email"], $_POST["phone"], $_POST["insurcode"]);
    $patient->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Patient has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Patient has not been Added!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";