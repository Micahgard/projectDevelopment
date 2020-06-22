<?php
/**
 * Author: Mojeeb
 * Date: 27/05/2020
 * Version: 1.0
 * Purpose: api for adding doctor
 */

include_once "../class/Doctor.php";

if (isset($_POST["lastname"])) {
    $doctor = new Doctor(null, $_POST["lastname"], $_POST["firstname"], $_POST["street"], $_POST["suburb"], $_POST["city"], $_POST["phone"], $_POST["speciality"], $_POST["salary"]);
    $doctor->save();
    $addSuccess = true;?>
    <script>history.back();</script>
    <div class="alert alert-primary alert-dismissible fade show display-none">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Doctor has been successfully added.
    </div>
    <?php
}else{
    ?>
    <a class="btn btn-danger" onclick="toastr.error('Hi! I am error message.');">Error message</a>
    <?php
    $msg = "doctor not added";
}
$msg = json_encode($msg);
echo $msg;