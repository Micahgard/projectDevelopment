<?php
/**
 * Author: Joel
 * Date: 03/06/2020
 * Version: 1.0
 * Purpose: api for updating research topic
 */

include_once "../class/Researchtopic.php";

if (isset($_POST['topicID'])){
    $id = $_POST['topicID'];
    $description = $_POST['description'];
    $level = $_POST['level'];
    $topic = new Researchtopic($id, $description, $level);
    $topic->update();
    $msg = "research topic updated";
}else{
    $msg = "research topic not updated";
}
$msg = json_encode($msg);
echo $msg;