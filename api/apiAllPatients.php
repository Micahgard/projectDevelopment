<?php
include_once "../class/Patient.php";
$admin = new Administrator();
$patients = $admin->allPatiens();
echo json_encode($patients);

