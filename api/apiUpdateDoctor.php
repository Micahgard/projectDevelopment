<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating payment
 */

include_once "../class/Doctor.php";

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $lastname = $_POST['lastname '];
    $firstname = $_POST['firstname'];
    $street = $_POST['street'];
    $suburb = $_POST['suburb'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $specialty = $_POST['specialty'];
    $salary = $_POST['salary'];
    $payment = new Payment($id, $lastname, $firstname,$street, $suburb, $city, $phone, $specialty, $salary);
    $payment->update();
    $msg = "doctor updated";
}else{
    $msg = "doctor not updated";
}
$msg = json_encode($msg);
echo $msg;