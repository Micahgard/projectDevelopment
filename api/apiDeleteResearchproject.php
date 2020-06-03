<?php
/**
 * Author: Mojeeb
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for deleting research project
 */

include_once "../class/Researchproject.php";

if (isset($_GET['projectID'])) {
    $project = new Researchproject($_GET["projectID"], "", "", "", "", "");
    $project->delete();
    $msg = "research project deleted";
}else{
    $msg = "research project not deleted";
}
$msg = json_encode($msg);
echo $msg;