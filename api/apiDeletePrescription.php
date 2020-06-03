<?php
/**
 * Author: Mojeeb
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for deleting prescription
 */

include_once "../class/Prescription.php";

if (isset($_GET['prescriptionID'])) {
    $prescription = new Prescription($_GET["prescriptionID"], "", "", "", "");
    $prescription->delete();
    $msg = "prescription deleted";
}else{
    $msg = "prescription not deleted";
}
$msg = json_encode($msg);
echo $msg;