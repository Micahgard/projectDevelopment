<?php
/**
 * Author: Joel
 * Date: 03/06/2020
 * Version: 1.0
 * Purpose: api for adding research topic
 */

include_once "../class/Researchtopic.php";

if (isset($_POST["description"])) {
    $topic = new Researchtopic(null, $_POST["description"], $_POST["level"]);
    $topic->save();
    $msg = "research topic added";
}else{
    $msg = "research topic not added";
}
$msg = json_encode($msg);
echo $msg;