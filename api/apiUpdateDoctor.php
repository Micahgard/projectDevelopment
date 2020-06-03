<?php
/**
 * Author: Mojeeb
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for updating doctor
 */

include_once "../class/Doctor.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $street = $_POST['street'];
    $suburb = $_POST['suburb'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $specialty = $_POST['specialty'];
    $salary = $_POST['salary'];
    $doctor = new Doctor($id, $lastname, $firstname, $street, $suburb, $city, $phone, $specialty, $salary);
    $doctor->update();
    $msg = "doctor updated";
}else{
    $msg = "doctor not updated";
}
$msg = json_encode($msg);
echo $msg;