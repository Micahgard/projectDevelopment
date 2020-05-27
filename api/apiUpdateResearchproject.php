<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for updating researchproject
 */

include_once "../class/Researchproject.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $enddate = $_POST['enddate'];
    $outcome = $_POST['outcome'];
    $budget = $_POST['budget'];
    $researchproject = new Researchproject($id, $enddate, $outcome, $budget);
    $researchproject->update();
    $msg = "researchproject updated";
}else{
    $msg = "researchproject not updated";
}
$msg = json_encode($msg);
echo $msg;