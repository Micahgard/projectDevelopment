<?php
/**
 * Author: Micah
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for deleting admission
 */

include_once "../class/Admission.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_GET['id'])) {
    $admission = new Admission($_GET["id"], "", "", "", "","");
    $admission->delete();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Admission has been Successfully Deleted!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Admission has not been Deleted!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";