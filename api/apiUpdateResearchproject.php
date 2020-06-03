<?php
/**
 * Author: Mojeeb
 * Date: 03/06/2020
 * Version: 1.1
 * Purpose: api for updating research project
 */

include_once "../class/Researchproject.php";

if (isset($_POST['projectID'])) {
    $id = $_POST['projectID'];
    $enddate = $_POST['enddate'];
    $outcome = $_POST['outcome'];
    $budget = $_POST['budget'];
    $doctorID = $_POST['doctorID'];
    $topicID = $_POST['topicID'];
    $researchproject = new Researchproject($id, $enddate, $outcome, $budget, $doctorID, $topicID);
    $researchproject->update();
    $msg = "research project updated";
}else{
    $msg = "research project not updated";
}
$msg = json_encode($msg);
echo $msg;