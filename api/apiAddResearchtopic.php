<?php
/**
 * Author: Aaron
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding researchtopic
 */

if (isset($_POST["description"])){      /*check the name of admission if it already existed in database*/
    include_once "../class/Researchtopic.php";
    $researchtopic = new Researchtopic(null, $_POST["description"], $_POST["level"]);
    $researchtopic =save();
    $msg = "new researchtopic added";
}else{
    $msg = "researchtopic already existed";
}
$msg = json_encode($msg);
echo $msg;