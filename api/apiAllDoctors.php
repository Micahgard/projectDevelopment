<?php
/**
 * Author: Joel
 * Date: 07/06/2020
 * Version: 1.0
 * Purpose: api for getting data from doctor
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$doctors = $admin->allDoctors();

echo json_encode($doctors);