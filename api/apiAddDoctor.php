<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding doctor
 */

include_once "../class/Doctor.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["lastname"])) {
    $doctor = new Doctor(null, $_POST["lastname"], $_POST["firstname"], $_POST["street"], $_POST["suburb"], $_POST["city"], $_POST["phone"], $_POST["speciality"], $_POST["salary"]);
    $doctor->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Doctor has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Doctor has not been Added!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";