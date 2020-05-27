<?php
/**
 * Author: Micah
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting patient
 */

include_once "../class/Patient.php";

if (isset($_GET['id'])) {
    $patient = new Patient($_GET["id"], "", "", "");
    $patient->delete();
    $patient = "patient deleted";
}else{
    $msg = "patient not deleted";
}
$msg = json_encode($msg);
echo $msg;