<?php
/**
 * Author: Micah
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting admission
 */

include_once "../class/Patient.php";

if (isset($_GET['id'])) {
    $admission = new Admission($_GET["id"], "", "", "");
    $admission->delete();
    $admission = "admission deleted";
}else{
    $msg = "admission not deleted";
}
$msg = json_encode($msg);
echo $msg;