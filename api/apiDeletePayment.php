<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting payment
 */

if (isset($_POST["paymentdate"])){      /*check the name of payment if it already existed in database*/
    include_once "../class/Payment.php";
    $Payment = new Payment(null, $_POST["paymentdate"], $_POST["amount"]);
    $Payment =save();
    $msg = "new payment deleted";
}else{
    $msg = "doctor already existed";
}
$msg = json_encode($msg);
echo $msg;
