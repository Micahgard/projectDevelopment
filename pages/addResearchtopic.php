<?php

?>

    <form action="../api/apiAddPatient.php" method="post">
        <h2>Add Research Topic</h2>
        <table class="table-sm table-borderless">
            <tbody>
            <tr>
                <td><label>Description* </label></td>
                <td><input type="text" id="description" name="description" size="50" required></td>
            </tr>

            <tr>
                <td><label>level:* </label></td>
                <td><select name="level">
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
                <td><input type="submit" name="addPatient" value="Add Patient"/></td>
                <td><input type="submit" name="return" value="Return"></td>
            </tr>
            </tbody>
        </table>
    </form>
<?php
