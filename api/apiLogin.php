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
            </div>
            <?php
            break;
        case 'facility':
            echo 'Welcome facility administrator';
            ?>
            <div class="block">
                <p><a href="../pages/addWard.php">Add Ward</a></p>
            </div>
            <?php
            break;
        case 'pharmacy':
            echo 'Welcome pharmacy administrator';
            ?>
            <div class="block">
                <p><a href="../pages/addMedication.php">Add Medication</a></p>
            </div>
            <?php
            break;
        case 'research':
            echo 'Welcome research administrator';
            ?>
            <div class="block">
                <p><a href="../pages/addResearchtopic.php">Add Research Topic</a></p>
            </div>
            <?php
            break;
        case 'clerk':
            echo 'Welcome payroll clerk';
            ?>
            <div class="block">
                <p><a href="../pages/addDoctor.php">Add Doctor</a></p>
            </div>
            <?php
            break;
    }
}