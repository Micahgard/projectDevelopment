<?php

?>

<form action="../api/apiAddWard.php" method="post">
    <h2>Add Ward</h2>
    <table class="table-sm table-borderless">
        <tbody>
        <tr>
            <td><label>Name:* </label></td>
            <td><input type="text" id="name" name="name" size="20" required></td>
        </tr>

        <tr>
            <td><label>Location:* </label></td>
            <td><input type="text" id="location" name="location" size="30" required></td>
        </tr>

        <tr>
            <td><label>capacity:* </label></td>
            <td><select name="capacity" size="5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </td>
        </tr>

        <tr><td><i style="color: red">* Required Fields</i></td></tr>
        <tr>
            <td><input type="submit" name="addWard" value="Add Ward"/></td>
            <td><input type="submit" name="return" value="Return"></td>
        </tr>
        </tbody>
    </table>
</form>
