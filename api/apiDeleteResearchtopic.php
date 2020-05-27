<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting researchtopic
 */

include_once "../class/Researchtopic.php";

if (isset($_GET['id'])) {
    $researchtopic = new Researchtopic($_GET["id"], "", "");
    $researchtopic->delete();
    $msg = "researchtopic deleted";
}else{
    $msg = "researchtopic not deleted";
}
$msg = json_encode($msg);
echo $msg;