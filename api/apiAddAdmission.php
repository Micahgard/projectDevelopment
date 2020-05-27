<?php
/**
 * Author: Micah
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding an admission
 */

include_once "../class/Admission.php";

if (isset($_POST["name"])) {
    $admission = new Admission(null, $_POST["description"], $_POST["admissiondate"], $_POST["status"]);
    $admission->save();
    $msg = "Admission added";
}else{
    $msg = "Admission not added";
}
$msg = json_encode($msg);
echo $msg;