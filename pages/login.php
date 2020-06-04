<?php
include_once 'head.php';
?>

<form action="../api/login.php" method="post">
    <label for="username">Username: </label></td>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password: </label></td>
    <input type="text" id="password" name="password"><br>
    <input type="submit" name="submit" value="Submit">
</form>
