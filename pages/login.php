<title>Log in</title>
<?php include_once 'head.php'; ?>
<body class="text-center">
    <form class="login" action="../api/apiLogin.php" method="post">
        <img src="../image/icon.png" alt="image error" width="150" height="150">
        <h1>Log in</h1>
        <input class="form-control" type="text" id="username" name="username" placeholder="Username" required autofocus>
        <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
        <button class="btn btn-outline-primary" type="submit">Log in</button>
    </form>
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

include_once '../pages/foot.php';
<?php include_once 'foot.php'; ?>