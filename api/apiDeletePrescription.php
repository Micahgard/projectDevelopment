<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting prescription
 */

include_once "../class/Prescription.php";

if (isset($_GET['id'])) {
    $prescription = new Prescription($_GET["id"], "", "");
    $prescription->delete();
    $msg = "prescription deleted";
}else{
    $msg = "prescription not deleted";
}
$msg = json_encode($msg);
echo $msg;