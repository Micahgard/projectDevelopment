<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Ward</title>
    <?php include_once 'head.php'; ?>
</head>

<body>

<form action="../api/apiAddWard.php" method="post">

    <h2>Add Ward</h2>
    <table>
        <tr>
            <td><label>Name:* </label></td>
            <td><input type="text" id="name" name="name" size="30" required></td>
        </tr>

        <tr>
            <td><label>Location:* </label></td>
            <td><input type="text" id="location" name="location" size="10" required></td>
        </tr>

        <tr>
            <td><label>capacity:* </label></td>
            <td><select name="capacity">
                    <?php
                    $i = 1;
                    while ($i<=20){
                        echo "<option value='".$i."'>".$i."</option>";
                        $i = $i + 1;
                    }
                    ?>
                </select>
            </td>
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
