<?php
/**
 * Author: Joel
 * Date: 26/05/2020
 * Version: 1.1
 * Purpose: api for deleting ward
 */

include_once "../class/Ward.php";

if (isset($_GET['wardID'])) {
    $ward = new Ward($_GET["wardID"], "", "", "");
    $ward->delete();
    $msg = "ward deleted";
}else{
    $msg = "ward not deleted";
}
$msg = json_encode($msg);
echo $msg;