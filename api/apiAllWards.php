<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$wards = $admin->allWards();

echo json_encode($wards);