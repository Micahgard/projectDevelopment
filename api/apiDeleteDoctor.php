<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting doctor
 */

include_once "../class/Doctor.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $doctor = new Doctor($_POST["id"], "", "", "", "", "", "", "", "");
    $doctor->delete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Doctor has been Successfully Deleted!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Doctor has not been Deleted!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";