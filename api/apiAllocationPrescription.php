<?php
/**
 * Author: Joel
 * Date: 22/06/2020
 * Version: 1.1
 * Purpose: api for getting data for allocating doctor and prescribing medication
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$admissions = $admin->currentAdmissionsForAllocationPrescription();

echo json_encode($admissions);
