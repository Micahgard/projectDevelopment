<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating payment
 */

include_once "../class/Payment.php";

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $paymentdate = $_POST['paymentdate'];
    $amount = $_POST['amount'];
    $payment = new Payment($id, $paymentdate, $amount);
    $payment->update();
    $msg = "payment updated";
}else{
    $msg = "payment not updated";
}
$msg = json_encode($msg);
echo $msg;