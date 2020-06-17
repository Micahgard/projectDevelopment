<?php
/**
 * Author: Micah
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating patient
 */

include_once "../class/Patient.php";

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
    $msg = "patient updated";
}else{
    $msg = "patient not updated";
}
$msg = json_encode($msg);
echo $msg;