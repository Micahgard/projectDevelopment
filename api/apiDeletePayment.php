<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting payment
 */

include_once "../class/Payment.php";

if (isset($_GET['id'])) {
    $payment = new Payment($_GET["id"], "", "");
    $payment->delete();
    $msg = "payment deleted";
}else{
    $msg = "payment not deleted";
}
$msg = json_encode($msg);
echo $msg;


