<?php
/**
 * Author: Joel
 * Date: 14/06/2020
 * Version: 1.0
 * Purpose: api for changing admission's status to billed
 */

include_once "../class/Billed.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $status = "billed";
    $invoice = new Billed($id, $status);
    $invoice->invoice();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Invoice has been Successfully Produced!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Invoice has not been Produced!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";