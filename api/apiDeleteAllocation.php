<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for deleting allocation
 */

include_once "../class/Allocation.php";

if (isset($_GET['id'])) {
    $allocation = new Allocation($_GET["id"], "", "");
    $allocation->delete();
    $msg = "allocation deleted";
}else{
    $msg = "allocation not deleted";
}
$msg = json_encode($msg);
echo $msg;