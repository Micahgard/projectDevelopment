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
    $doctor->save();?>
    <div id="addDoctor">Doctor Added Successfully!</div>
    <script>
        function addDoctor() {
            var x = document.getElementById("addDoctor");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
    <?php
}else{
    $msg = "doctor not added";
}
$msg = json_encode($msg);
echo $msg;