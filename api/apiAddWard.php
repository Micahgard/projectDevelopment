<?php
/**
 * Author: Joel
 * Date: 26/05/2020
 * Version: 1.1
 * Purpose: api for adding ward
 */

include_once "../class/Ward.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["name"])) {
    $ward = new Ward(null, $_POST["name"], $_POST["location"], $_POST["capacity"]);
    $ward->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Ward has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Ward has not been Added!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";