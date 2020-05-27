<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding researchproject
 */

include_once "../class/Researchproject.php";

if (isset($_POST["name"])) {
    $researchproject = new Researchproject(null, $_POST["enddate"], $_POST["outcome"], $_POST["budget"]);
    $researchproject->save();
    $msg = "researchproject added";
}else{
    $msg = "researchproject not added";
}
$msg = json_encode($msg);
echo $msg;