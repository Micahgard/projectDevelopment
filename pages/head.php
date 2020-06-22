<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../styles/css/global.css" rel="stylesheet">
    <!-- Latest CSS -->
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" href="../image/icon.png">
</head>
<body>
    <img class="headimg" src="../image/head.jpg" alt="image error">
<?php
    include_once "class/Administrator.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
    $login = new Administrator();
    $login->login($username, $password);
    switch($login->role) {
    case 'senior':
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
    <div class="container">
        <h1>Welcome Senior Administrator</h1>
        <?php
            break;

        case 'assistant':
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
        <div class="container">
            <h1>Welcome Assistant Administrator</h1>
            <?php
            break;

            case 'facility':
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                        <a class="btn btn-outline-light" href="../pages/allWard.php">WARD</a>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <h1>Welcome Facility Administrator</h1>
                <?php
                break;

                case 'pharmacy':
                ?>
                <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                            <a class="btn btn-outline-light" href="../pages/allMedication.php">MEDICATION</a>
                        </li>
                    </ul>
                </nav>
                <div class="container">
                    <h1>Welcome Pharmacy Administrator</h1>
                    <?php
                    break;

                    case 'research':
                    ?>
                    <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="container">
                        <h1>Welcome Research Administrator</h1>
                        <?php
                        break;

                        case 'clerk':
                        ?>
                        <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" href="../pages/login.php">HOME</a>
                                    <a class="btn btn-outline-light" href="../pages/allDoctor.php">DOCTOR</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="container">
                            <h1>Welcome Payroll Clerk</h1>
<?php
break;
}
}