<?php
include_once '../pages/head.php';
include_once "../class/Administrator.php";

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $login = new Administrator();
    $login->login($username, $password);

    switch($login->role) {
        case 'senior':
            echo 'Welcome senior administrator';
            ?>
            <div class="block">
                <p><a href="../pages/allPatient.php">All Patient</a></p>
                <p><a href="../pages/patientsReport.php">Patients Report</a></p>
                <p><a href="../pages/recordPayment.php">Record Payment</a></p>
                <p><a href="../pages/allDoctor.php">All Doctor</a></p>
                <p><a href="../pages/doctorsReport.php">9. Doctors Report</a></p>
                <p><a href="../pages/allAdmission.php">All Admission</a></p>
                <p><a href="../pages/admissionsReport.php">13. Admissions Report</a></p>
                <p><a href="../pages/allMedication.php">All Medication</a></p>
                <p><a href="../pages/allWard.php">All Ward</a></p>
                <p><a href="../pages/closeAdmission.php">25. Close Admission</a></p>
                <p><a href="../pages/addResearchproject.php">26. Add Research Project</a></p>
                <p><a href="../pages/removeResearchproject.php">27. Remove Research Project</a></p>
                <p><a href="../pages/addResearchtopic.php">28. Add Research Topic</a></p>
                <p><a href="../pages/updateResearchtopic.php">29. Update Research Topic</a></p>
                <p><a href="../pages/deleteResearchtopic.php">30. Delete Research Topic</a></p>
            </div>
            <?php
            break;

        case 'assistant':
            echo 'Welcome assistant administrator';
            ?>
            <div class="block">
                <p><a href="../pages/addPatient.php">Add Patient</a></p>
                <p><a href="../pages/updatePatient.php">Update Patient</a></p>
                <p><a href="../pages/deletePatient.php">Delete Patient</a></p>
                <p><a href="../pages/patientsReport.php">Patients Report</a></p>
                <p><a href="../pages/recordPayment.php">Record Payment</a></p>
                <p><a href="../pages/produceInvoice.php">Produce Invoice</a></p>
                <p><a href="../pages/addAdmission.php">Add Admission</a></p>
                <p><a href="../pages/updateAdmission.php">Update Admission</a></p>
                <p><a href="../pages/deleteAdmission.php">Delete Admission</a></p>
                <p><a href="../pages/admissionsReport.php">Admissions Report</a></p>
                <p><a href="../pages/closeAdmission.php">Close Admission</a></p>
                <p><a href="../pages/allocateDoctor.php">Allocate doctor</a></p>
                <p><a href="../pages/removeDoctor.php">Remove doctor</a></p>
            </div>
            <?php
            break;

        case 'facility':
            echo 'Welcome facility administrator';
            ?>
            <div class="block">
                <p><a href="../pages/addWard.php">Add Ward</a></p>
                <p><a href="../pages/updateWard.php">Update Ward</a></p>
                <p><a href="../pages/deleteWard.php">Delete Ward</a></p>
            </div>
            <?php
            break;

        case 'pharmacy':
            echo 'Welcome pharmacy administrator';
            ?>
            <div class="block">
                <p><a href="../pages/allMedication.php">Medication</a></p>
            </div>
            <?php
            break;

        case 'research':
            echo 'Welcome research administrator';
            ?>
            <div class="block">
                <p><a href="../pages/addResearchtopic.php">Add Research Topic</a></p>
                <p><a href="../pages/updateResearchtopic.php">Update Research Topic</a></p>
                <p><a href="../pages/deleteResearchtopic.php">Delete Research Topic</a></p>
                <p><a href="../pages/addResearchproject.php">Add Research Project</a></p>
                <p><a href="../pages/removeResearchproject.php">Remove Research Project</a></p>
            </div>
            <?php
            break;

        case 'clerk':
            echo 'Welcome payroll clerk';
            ?>
            <div class="block">
                <p><a href="../pages/addDoctor.php">Add Doctor</a></p>
                <p><a href="../pages/updateDoctor.php">Update Doctor</a></p>
                <p><a href="../pages/deleteDoctor.php">Delete Doctor</a></p>
                <p><a href="../pages/doctorsReport.php">Doctors Report</a></p>
            </div>
            <?php
            break;
    }
}

include_once '../pages/foot.php';