<?php
<<<<<<< HEAD
<<<<<<< HEAD
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
=======
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
>>>>>>> parent of 0d65c6c... bb
=======
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
>>>>>>> parent of 0d65c6c... bb
include_once "../class/Administrator.php";
$admin = new Administrator();
$admissions = $admin->showAdmissions();

echo json_encode($admissions);
