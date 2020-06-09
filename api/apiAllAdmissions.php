<?php
include_once "../class/Administrator.php";
$admin = new Administrator();
$admissions = $admin->showAdmission();
print_r($admissions);
echo json_encode($admissions);