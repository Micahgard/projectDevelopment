<?php
include_once 'head.php';
?>

<form action="../api/login.php" method="post">
    <h2>Update Admission</h2>
    <table class="table-sm table-borderless">
        <tbody>
        <tr>
            <td><label for="username">Username: </label></td>
            <td><input type="text" id="username" name="username"></td>
        </tr>
        <tr>
            <td><label for="password">Password: </label></td>
            <td><input type="text" id="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
        </tbody>
    </table>
</form>