<style>
    p {
        text-align: center;
    }
</style>
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
                        <a class="btn btn-outline-light" href="../pages/allDoctor.php">DOCTOR</a>
                        <a class="btn btn-outline-light" href="../pages/allAdmission.php">ADMISSION</a>
                        <a class="btn btn-outline-light" href="../pages/allPatient.php">PATIENT</a>
                        <a class="btn btn-outline-light" href="../pages/allMedication.php">MEDICATION</a>
                        <a class="btn btn-outline-light" href="../pages/allWard.php">WARD</a>
                        <a class="btn btn-outline-light" href="../index.php">LOG OUT</a>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <h1>Welcome Senior Administrator</h1>
                <p>Welcome to Saint Albert Hospital Management. Your permissions are listed above.</p>
                <img class="img-fluid rounded mx-auto d-block" src="../image/icon.png" alt="logo-icon">
            <?php
            break;

        case 'assistant':
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/allAdmission.php">ADMISSION</a>
                        <a class="btn btn-outline-light" href="../pages/allPatient.php">PATIENT</a>
                        <a class="btn btn-outline-light" href="../index.php">LOG OUT</a>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <h1>Welcome Assistant Administrator</h1>
                <p>Welcome to Saint Albert Hospital Management. Your permissions are listed above.</p>
                <p>For requiring more permissions, please contact your Senior Administrator.</p>
                <img class="img-fluid rounded mx-auto d-block" src="../image/icon.png" alt="logo-icon">
            <?php
            break;

        case 'facility':
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/allWard.php">WARD</a>
                        <a class="btn btn-outline-light" href="../index.php">LOG OUT</a>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <h1>Welcome Facility Administrator</h1>
                <p>Welcome to Saint Albert Hospital Management. Your permissions are listed above.</p>
                <p>For requiring more permissions, please contact your Senior Administrator.</p>
                <img class="img-fluid rounded mx-auto d-block" src="../image/icon.png" alt="logo-icon">
            <?php
            break;

        case 'pharmacy':
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/allMedication.php">MEDICATION</a>
                        <a class="btn btn-outline-light" href="../index.php">LOG OUT</a>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <h1>Welcome Pharmacy Administrator</h1>
                <p>Welcome to Saint Albert Hospital Management. Your permissions are listed above.</p>
                <p>For requiring more permissions, please contact your Senior Administrator.</p>
                <img class="img-fluid rounded mx-auto d-block" src="../image/icon.png" alt="logo-icon">
            <?php
            break;

        case 'research':
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../index.php">LOG OUT</a>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <h1>Welcome Research Administrator</h1>
                <p>Welcome to Saint Albert Hospital Management. Your permissions are listed above.</p>
                <p>For requiring more permissions, please contact your Senior Administrator.</p>
                <img class="img-fluid rounded mx-auto d-block" src="../image/icon.png" alt="logo-icon">
            <?php
            break;

        case 'clerk':
            ?>
            <nav class="navbar navbar-expand-sm bg-primary navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="../pages/allDoctor.php">DOCTOR</a>
                        <a class="btn btn-outline-light" href="../index.php">LOG OUT</a>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <h1>Welcome Payroll Clerk</h1>
                <p>Welcome to Saint Albert Hospital Management. Your permissions are listed above.</p>
                <p>For requiring more permissions, please contact your Senior Administrator.</p>
                <img class="img-fluid rounded mx-auto d-block" src="../image/icon.png" alt="logo-icon">
            <?php
            break;

        case 'wrong';
            ?>
            <div class="container">
                <p style="font-size: 25px; text-align: center">username or password incorrect!</p>
                <p style="font-size: 25px; text-align: center">auto returning... </p>
                <script>notificationGoBack();</script>
            <?php
            break;
    }
}

include_once '../pages/foot.php';