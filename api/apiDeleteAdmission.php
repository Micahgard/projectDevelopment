<?php
/**
 * Author: Micah
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for deleting admission
 */

include_once "../class/Admission.php.php";

if (isset($_GET['admissionID'])) {
    $admission = new Admission($_GET["admissionID"], "", "", "");
    $admission->delete();
    $admission = "admission deleted";
}else{
    $msg = "admission not deleted";
}
$msg = json_encode($msg);
echo $msg;