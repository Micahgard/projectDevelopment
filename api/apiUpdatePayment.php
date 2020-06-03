<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating payment
 */

include_once "../class/Payment.php";

if (isset($_POST['paymentcode'])){
    $id = $_POST['paymentcode'];
    $paymentdate = $_POST['paymentdate'];
    $amount = $_POST['amount'];
    $admissionID = $_POST['admissionID'];
    $payment = new Payment($id, $paymentdate, $amount, $admissionID);
    $payment->update();
    $msg = "payment updated";
}else{
    $msg = "payment not updated";
}
$msg = json_encode($msg);
echo $msg;