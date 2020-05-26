<?php
/**
 * Author: Joel
 * Date: 25/05/2020
 * Version: 1.0
 * Purpose: api for updating ward
 */

include_once "../class/Ward.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $ward = new Ward($id, $name, $location, $capacity);
    $ward->update();
    $msg = "ward updated";
}else{
    $msg = "ward not updated";
}
$msg = json_encode($msg);
echo $msg;