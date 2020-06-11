<?php
include_once "../class/Administrator.php";
$admin = new Administrator();
$patients = $admin->allPatiens();
echo json_encode($patients);

