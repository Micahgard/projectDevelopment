<?php
include_once "../class/Administrator.php";
$admin = new Administrator();
$admissions = $admin->showAdmissions();
echo json_encode($admissions);