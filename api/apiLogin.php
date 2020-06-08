<?php

include_once "../class/Administrator.php";

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $login = new Administrator();
    $login->login($username, $password);

    switch($login->role) {
        case 'senior':
            echo 'senior';
            break;

        case 'assistant':
            echo 'Welcome assistant administrator';
            ?>
            <div class="block">
                <p><a href="../pages/addPatient.php">Add Patient</a></p>
                <p><a href="../pages/updatePatient.php">Update Patient</a></p>
                <p><a href="../pages/deletePatient.php">Delete Patient</a></p>
                <p><a href="../pages/patientsReport.php">Patients Report</a></p>
                <p><a href="../pages/payment.php">Record Payment</a></p>
                <p><a href="../pages/invoice.php">Produce Invoice</a></p>
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
                <p><a href="../pages/addMedication.php">Add Medication</a></p>
                <p><a href="../pages/updateMedication.php">Update Medication</a></p>
                <p><a href="../pages/deleteMedication.php">Delete Medication</a></p>
                <p><a href="../pages/prescribeMedication.php">Prescribe Medication</a></p>
                <p><a href="../pages/removePrescription.php">Remove Prescription</a></p>
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