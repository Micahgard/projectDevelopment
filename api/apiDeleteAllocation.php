<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting allocation
 */

include_once "../class/Allocation.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $allocation = new Allocation($_POST["id"], "", "", "", "");
    $allocation->delete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Allocation has been Successfully Deleted!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Allocation has not been Deleted!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";