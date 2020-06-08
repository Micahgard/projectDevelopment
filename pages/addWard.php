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
            <td><select name="capacity">
                    <?php
                    $i = 1;
                    while ($i<=20){
                        echo '<option value="$i">$i</option>';
                        $i = $i + 1;
                    }

                    ?>
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
