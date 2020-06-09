<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Research Topic</title>
    <?php include_once 'head.php'; ?>
</head>

<body>

<form action="../api/apiAddResearchtopic.php" method="post">

    <h2>Add Research Topic</h2>
    <table>
        <tr>
            <td><label>Description* </label></td>
            <td><input type="text" id="description" name="description" size="50" required></td>
        </tr>

        <tr>
            <td><label>level:* </label></td>
            <td><select name="level">
                    <?php
                    $i = 1;
                    while ($i<=10){
                        echo "<option value='".$i."'>".$i."</option>";
                        $i = $i + 1;
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr><td><i style="color: red">* Required Fields</i></td></tr>
        <tr>
            <td><input class="btn" type="submit" value="Add Topic"/></td>
            <td><a href="../api/apiLogin.php"><input class="btn" type="button" value="Return"></a></td>
        </tr>
    </table>
</form>

<div class="foot">
    <?php include_once 'foot.php'; ?>
</div>
</body>