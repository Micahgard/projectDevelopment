<?php
/**
 * Author: Joel
 * Date: 23/06/2020
 * Version: 1.0
 * Purpose: api for changing admission's status to close
 */

include_once "../class/Admission.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_GET['id'])) {
    $admission = new Admission($_GET["id"], "", "", "", "","");
    $admission->closeAndDelete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Admission has been Successfully Closed!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Admission has not been Closed!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";