<?php
/**
 * Author: Joel
 * Date: 02/06/2020
 * Version: 1.0
 * Purpose: api for updating medication
 */

include_once "../class/Medication.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $medication = new Medication($id, $name, $cost);
    $medication->update();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Medication has been Successfully Updated!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Medication has not been Updated!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";