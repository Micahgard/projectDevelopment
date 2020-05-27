<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating doctor
 */

include_once "../class/Doctor.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $lastname = $_POST['la stname'];
    $firstname = $_POST['firstname'];
    $street = $_POST['street'];
    $suburb = $_POST['suburb'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $speciality = $_POST['speciality'];
    $salary = $_POST['salary'];
    $doctor = new Doctor($id, $lastname, $firstname, $street, $suburb, $city, $phone, $speciality, $salary);
    $doctor->update();
    $msg = "doctor updated";
}else{
    $msg = "doctor not updated";
}
$msg = json_encode($msg);
echo $msg;