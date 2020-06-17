<?php
/**
 * Author: Joel
 * Date: 13/06/2020
 * Version: 1.0
 * Purpose: api for getting data for admission's invoice
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$admissions = $admin->completeAdmissions();

echo json_encode($admissions);