<?php
/**
 * Author: Joel
 * Date: 03/06/2020
 * Version: 1.0
 * Purpose: api for updating research topic
 */

include_once "../class/Researchtopic.php";

if (isset($_POST['TopicID'])){
    $id = $_POST['TopicID'];
    $description = $_POST['description'];
    $level = $_POST['level'];
    $topic = new topic($id, $description, $level);
    $topic->update();
    $msg = "research topic updated";
}else{
    $msg = "research topic not updated";
}
$msg = json_encode($msg);
echo $msg;