<?php
/**
 * Author: Joel
 * Date: 03/06/2020
 * Version: 1.0
 * Purpose: api for deleting research topic
 */

include_once "../class/Researchtopic.php";

if (isset($_GET['topicID'])) {
    $topic = new Researchtopic($_GET["topicID"], "", "");
    $topic->delete();
    $msg = "research topic deleted";
}else{
    $msg = "research topic not deleted";
}
$msg = json_encode($msg);
echo $msg;