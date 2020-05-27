<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting researchproject
 */

include_once "../class/Researchproject.php";

if (isset($_GET['id'])) {
    $researchproject = new Researchproject($_GET["id"], "", "", "");
    $researchproject->delete();
    $msg = "researchproject deleted";
}else{
    $msg = "researchproject not deleted";
}
$msg = json_encode($msg);
echo $msg;