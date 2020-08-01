<title>Log in</title>
<?php include_once 'pages/head.php'; ?>
<?php include_once 'pages/head-child.php'; ?>
<body class="text-center">
    <form class="login" action="api/apiLogin.php" method="post">
        <img src="image/icon.png" alt="image error" width="150" height="150">
        <h1>Log in</h1>
        <input class="form-control" type="text" id="username" name="username" placeholder="Username" required autofocus>
        <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
        <button class="btn btn-outline-primary" type="submit">Log in</button>
    </form>

<?php include_once 'pages/foot.php'; ?>