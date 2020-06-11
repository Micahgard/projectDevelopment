<?php
/**
 * Author: Micah
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for adding an admission
 */

include_once "../class/Admission.php";

if (isset($_POST["description"])) {
    $admission = new Admission(null, $_POST["description"], $_POST["admissiondate"], "current", $_POST["patientID"], $_POST["wardID"]);
    $admission->save();
    $msg = "Admission added";
}else{
    $msg = "Admission not added";
}
$msg = json_encode($msg);
echo $msg;