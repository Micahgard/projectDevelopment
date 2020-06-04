<?php

$username = $_POST['username'];
$password = $_POST['password'];

//$admin = new Administrator();
//$admin->login();
//
//if (!empty($username) & !empty($password)) {
//
//}else {
//
//}
if (isset($_POST["username"])) {
    $admission = new Administrator(null, $_POST["description"], $_POST["admissiondate"], $_POST["status"], $_POST["patientID"], $_POST["wardID"]);
    $admission->save();
    $msg = "Admission added";
}else{
    $msg = "Admission not added";
}
$msg = json_encode($msg);
echo $msg;
