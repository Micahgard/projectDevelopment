<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding payment
 */

include_once "../class/Payment.php";

if (isset($_POST["admissionID"])) {
    $payment = new Payment(null, date("y-m-d"), $_POST["amount"], $_POST["admissionID"]);
    $payment->save();
    $msg = "payment added";
}else{
    $msg = "payment not added";
}
$msg = json_encode($msg);
echo $msg;