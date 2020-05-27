<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating researchtopic
 */

include_once "../class/Payment.php";

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $description = $_POST['description'];
    $level= $_POST['level'];
    $researchtopic = new Researchtopic($id, $description, $level);
    $researchtopic->update();
    $msg = "researchtopic updated";
}else{
    $msg = "researchtopic not updated";
}
$msg = json_encode($msg);
echo $msg;