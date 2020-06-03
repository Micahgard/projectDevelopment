<?php
/**
 * Author: Joel
 * Date: 02/06/2020
 * Version: 1.0
 * Purpose: api for deleting medication
 */

include_once "../class/Medication.php";

if (isset($_GET['MedicationID'])) {
    $medication = new Medication($_GET["MedicationID"], "", "");
    $medication->delete();
    $msg = "medication deleted";
}else{
    $msg = "medication not deleted";
}
$msg = json_encode($msg);
echo $msg;
