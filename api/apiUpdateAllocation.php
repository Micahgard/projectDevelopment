<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating allocation
 */

include_once "../class/Allocation.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $fee = $_POST['fee'];
    $role = $_POST['role'];
    $doctorid = $_POST['doctorid'];
    $admissionid = $_POST['admissionid'];
    $allocation = new Allocation($id, $fee, $role, $doctorid, $admissionid);
    $allocation->update();
    $msg = "allocation updated";
}else{
    $msg = "allocation not updated";
}
$msg = json_encode($msg);
echo $msg;