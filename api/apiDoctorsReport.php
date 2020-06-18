<?php
/**
 * Author: Joel
 * Date: 12/06/2020
 * Version: 1.0
 * Purpose: api for getting data for doctor's report
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$doctors = $admin->showDoctors();

echo json_encode($doctors);