<?php
/**
 * Author: Aaron
 * Date: 15/06/2020
 * Version: 1.0
 * Purpose: api for allocating doctor
 */

include_once "../class/AllocateDoctor.php";

if (isset($_POST['topicID'])){
    $id = $_POST['topicID'];
    $description = $_POST['description'];
    $fee = $_POST['fee'];
    $role = $_POST['role'];
    $topic = new Doctor($id, $description, $fee, $role);
    $topic->allocate();
    $msg = "doctor allocated";
}else{
    $msg = "doctor not allocated";
}
$msg = json_encode($msg);
echo $msg;