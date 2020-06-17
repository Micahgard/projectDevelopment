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
            echo 'Welcome Senior Administrator';
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                        <a class="btn btn-outline-light" href="../pages/allDoctor.php">DOCTOR</a>
                        <a class="btn btn-outline-light" href="../pages/allAdmission.php">ADMISSION</a>
                        <a class="btn btn-outline-light" href="../pages/allPatient.php">PATIENT</a>
                        <a class="btn btn-outline-light" href="../pages/allMedication.php">MEDICATION</a>
                        <a class="btn btn-outline-light" href="../pages/allWard.php">WARD</a>
                    </li>
                </ul>
            </nav>
            <?php
            break;

        case 'assistant':
            echo 'Welcome Assistant Administrator';
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                        <a class="btn btn-outline-light" href="../pages/allAdmission.php">ADMISSION</a>
                        <a class="btn btn-outline-light" href="../pages/allPatient.php">PATIENT</a>
                    </li>
                </ul>
            </nav>
            <?php
            break;

        case 'facility':
            echo 'Welcome Facility Administrator';
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                        <a class="btn btn-outline-light" href="../pages/allWard.php">WARD</a>
                    </li>
                </ul>
            </nav>
            <?php
            break;

        case 'pharmacy':
            echo 'Welcome Pharmacy Administrator';
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                        <a class="btn btn-outline-light" href="../pages/allMedication.php">MEDICATION</a>
                    </li>
                </ul>
            </nav>
            <?php
            break;

        case 'research':
            echo 'Welcome Research Administrator';
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                    </li>
                </ul>
            </nav>
            <?php
            break;

        case 'clerk':
            echo 'Welcome Payroll Clerk';
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                        <a class="btn btn-outline-light" href="../pages/allDoctor.php">DOCTOR</a>
                    </li>
                </ul>
            </nav>
            <?php
            break;
    }
}

include_once '../pages/foot.php';