<?php
/**
 * Author: Micah
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating patient
 */

include_once "../class/Patient.php";
include_once "../pages/head.php";
include_once "../pages/head-child.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $street = $_POST['street'];
    $suburb = $_POST['suburb'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $insurcode = $_POST['insurcode'];
    $patient = new Patient($id, $lastname, $firstname, $street, $suburb, $city, $email, $phone, $insurcode);
    $patient->update();
    ?><div class="container">
        <div class="success-notification"><b style="font-size: 20px;">✓</b>&nbsp; Patient has been Successfully Updated!</div>
        <script>notificationGoBack();</script><?php
}else{
    ?><div class="container">
        <div class="failure-notification">⚠️&nbsp;Patient has not been Updated!</div>
        <script>notificationGoBack();</script><?php
}

include_once "../pages/foot.php";