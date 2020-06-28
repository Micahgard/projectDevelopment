<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding payment
 */

include_once "../class/Payment.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["admissionID"])) {
    $payment = new Payment(null, date("y-m-d"), $_POST["amount"], $_POST["admissionID"]);
    $payment->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Payment has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Payment has not been Added!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";