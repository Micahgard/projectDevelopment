<?php
/**
 * Author: Joel
 * Date: 02/06/2020
 * Version: 1.0
 * Purpose: api for updating medication
 */

include_once "../class/Medication.php";

if (isset($_POST['MedicationID'])){
    $id = $_POST['MedicationID'];
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $medication = new Medication($id, $name, $cost);
    $medication->update();
    $msg = "medication updated";
}else{
    $msg = "medication not updated";
}
$msg = json_encode($msg);
echo $msg;