<?php
<<<<<<< HEAD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$doctors = $admin->allDoctors();
=======
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include_once "../class/Administrator.php";
$admin = new Administrator();
$doctors = $admin->allDoctors();

>>>>>>> parent of 0d65c6c... bb
echo json_encode($doctors);

