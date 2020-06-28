<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting payment
 */

include_once "../class/Payment.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_GET['id'])) {
    $payment = new Payment($_GET["id"], "", "", "");
    $payment->delete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Payment has been Successfully Deleted!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Payment has not been Deleted!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";
