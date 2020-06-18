<?php
/**
 * Author: Joel
 * Date: 05/06/2020
 * Version: 1.0
 * Purpose: api for getting data from patient
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$allpatients = $admin->allPatiens();
$patients = $admin->patiensWithoutAdmission();

echo json_encode($allpatients);
echo json_encode($patients);