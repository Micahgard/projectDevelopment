<?php

?>

<form action="../api/apiAddMedication.php" method="post">
    <h2>Add Medication</h2>
    <table class="table-sm table-borderless">
        <tbody>
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
            <td><input type="submit" name="addMedication" value="Add Medication"/></td>
            <td><input type="submit" name="return" value="Return"></td>
        </tr>
        </tbody>
    </table>
</form>
