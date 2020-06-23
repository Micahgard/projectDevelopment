<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding allocation
 */

include_once "../class/Allocation.php";

if (isset($_POST["doctorID"])) {
    $allocation = new Allocation(null, $_POST["fee"], $_POST["role"], $_POST["doctorID"], $_POST["admissionID"]);
    $allocation->save();
    $msg = "allocation added";
}else{
    $msg = "allocation not added";
}
$msg = json_encode($msg);
echo $msg;