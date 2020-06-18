<?php
/**
 * Author: Joel
 * Date: 14/06/2020
 * Version: 1.0
 * Purpose: api for changing admission's status to billed
 */

include_once "../class/Billed.php";
    $id = $_POST['id'];
    $status = "billed";
    $invoice = new Billed($id, $status);
    $invoice->invoice();
$msg = json_encode($msg);
echo $msg;
