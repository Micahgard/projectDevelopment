<?php
include_once "../class/Patient.php";
$admin = new Administrator();
$patient = $admin->findPatientByPatientID();
echo json_encode($patient);

