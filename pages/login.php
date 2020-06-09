<!DOCTYPE html>
<html lang="en">

<head>
<title>Log in</title>
    <?php include_once 'head.php'; ?>
</head>

<body class="text-center">
    <form class="login" action="../api/apiLogin.php" method="post">
        <img src="../image/icon.png" alt="image error" width="150" height="150">
        <h2>Log in</h2>
        <input class="form-control" type="text" id="username" name="username" placeholder="Username" required autofocus>
        <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
        <button class="btn" type="submit">Log in</button>
    </form>

<div class="foot">
    <?php include_once 'foot.php'; ?>
</div>
</body>