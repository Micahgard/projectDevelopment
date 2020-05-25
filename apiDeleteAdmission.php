<?php
/**
 * Author: Aaron
 * Date: 25/05/2020
 * Version: 1.0
 * Purpose: api for deleting admission
 */

if (isset($_POST["description"])){      /*check the name of admission if it already existed in database*/
    include_once "../class/Admission.php";
    $admission = new Admission(null, $_POST["description"], $_POST["admissiondate"], $_POST["status"]);
    $admission =save();
    $msg = "new admission deleted";
}else{
    $msg = "admission already existed";
}
$msg = json_encode($msg);
echo $msg;