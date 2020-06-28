<?php
/**
 * Author: Micah
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for adding an admission
 */

include_once "../class/Admission.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST["description"])) {
    $admission = new Admission(null, $_POST["description"], $_POST["admissiondate"], "current", $_POST["patientID"], $_POST["wardID"]);
    $admission->save();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Admission has been Successfully Added!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Admission has not been Added!</div>
        <script>notificationGoBack();</script><?php
}
include_once "../pages/foot.php";