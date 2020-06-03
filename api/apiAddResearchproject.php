<?php
/**
 * Author: Mojeeb
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for adding research project
 */

include_once "../class/Researchproject.php";

if (isset($_POST["outcome"])) {
    $project = new Researchproject(null, $_POST["enddate"], $_POST["outcome"], $_POST["budget"], $_POST["doctorID"], $_POST["topicID"]);
    $project->save();
    $msg = "research project added";
}else{
    $msg = "research project not added";
}
$msg = json_encode($msg);
echo $msg;