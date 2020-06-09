<?php
include_once "../class/Administrator.php";
$admin = new Administrator();
$admissions = $admin->showAdmission();

echo json_encode($admissions);