<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Medication</title>
    <?php include_once 'head.php'; ?>
</head>

<body>

<form action="../api/apiAddMedication.php" method="post">

    <h2>Add Medication</h2>
    <table>
        <tr>
            <td><label>Name:* </label></td>
            <td><input type="text" id="name" name="name" size="30" required></td>
        </tr>

        <tr>
            <td><label>Cost:* </label></td>
            <td><input type="text" id="cost" name="cost" size="10" required></td>
        </tr>

        <tr><td><i style="color: red">* Required Fields</i></td></tr>
        <tr>
            <td><input class="btn" type="submit" value="Add Medication"/></td>
            <td><a href="../api/apiLogin.php"><input class="btn" type="button" value="Return"></a></td>
        </tr>
    </table>
</form>

<div class="foot">
    <?php include_once 'foot.php'; ?>
</div>
</body>
