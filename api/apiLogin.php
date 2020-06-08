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
            echo 'assistant';
            ?>
            <div class="block">
                <p><a href="../pages/addPatient.php">Add Patient</a></p>
            </div>
            <?php
            break;
        case 'facility':
            echo 'facility';
            break;
        case 'pharmacy':
            echo 'pharmacy';
            ?>
            <div class="block">
                <p><a href="../pages/addMedication.php">Add Medication</a></p>
            </div>
            <?php
            break;
        case 'research':
            echo 'research';
            break;
        case 'clerk':
            echo 'clerk';
            ?>
            <div class="block">
                <p><a href="../pages/addDoctor.php">Add Doctor</a></p>
            </div>
            <?php
            break;
    }
}