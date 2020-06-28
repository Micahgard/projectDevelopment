<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating payment
 */

include_once "../class/Payment.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $paymentdate = $_POST['paymentdate'];
    $amount = $_POST['amount'];
    $admissionID = $_POST['admissionID'];
    $payment = new Payment($id, $paymentdate, $amount, $admissionID);
    $payment->update();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Payment has been Successfully Updated!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Payment has not been Updated!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";