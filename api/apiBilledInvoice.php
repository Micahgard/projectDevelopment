<?php
/**
 * Author: Joel
 * Date: 14/06/2020
 * Version: 1.0
 * Purpose: api for changing admission's status to billed
 */

include_once "../class/Admission.php";
    $id = $_POST['id'];
    $status = "billed";
    $admission = new Admission($id, $status);
    $admission->invoice();
    $msg = "status changed to billed";

$msg = json_encode($msg);
echo $msg;
