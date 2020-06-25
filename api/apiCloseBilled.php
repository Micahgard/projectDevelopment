<?php
/**
 * Author: Joel
 * Date: 23/06/2020
 * Version: 1.0
 * Purpose: api for changing admission's status to close
 */

include_once "../class/Admission.php";

if (isset($_GET['id'])) {
    $admission = new Admission($_GET["id"], "", "", "", "","");
    $admission->closeAndDelete();
    $msg = "admission closed";
}else{
    $msg = "admission not closed";
}
$msg = json_encode($msg);
echo $msg;
