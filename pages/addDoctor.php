<?php

?>

    <form action="../api/apiAddDoctor.php" method="post">
        <h2>Add Doctor</h2>
        <table class="table-sm table-borderless">
            <tbody>
            <tr>
                <td><label>Last Name:* </label></td>
                <td><input type="text" id="lastname" name="lastname" size="25" required></td>
            </tr>

            <tr>
                <td><label>First Name:* </label></td>
                <td><input type="text" id="firstname" name="firstname" size="25" required></td>
            </tr>

            <tr>
                <td><label>Street Address:* </label></td>
                <td><input type="text" id="street" name="street" size="50" required></td>
            </tr>

            <tr>
                <td><label>Suburb:* </label></td>
                <td><input type="text" id="suburb" name="suburb" size="20" required></td>
            </tr>

            <tr>
                <td><label>City:* </label></td>
                <td><input type="text" id="city" name="city" size="20" required></td>
            </tr>

            <tr>
                <td><label>Email Address:* </label></td>
                <td><input type="email" id="email" name="email" size="30" required></td>
            </tr>

            <tr>
                <td><label>Phone Number:* </label></td>
                <td><input type="text" id="phone" name="phone" size="15" required></td>
            </tr>

            <tr>
                <td><label>Speciality* </label></td>
                <td><input type="text" id="speciality" name="speciality" size="20" required></td>
            </tr>

            <tr>
                <td><label>Salary* </label></td>
                <td><input type="text" id="salary" name="salary" size="20" required></td>
            </tr>



            <tr><td><i style="color: red">* Required Fields</i></td></tr>
            <tr>
                <td><input type="submit" name="addDoctor" value="Add Doctor"/></td>
                <td><input type="submit" name="return" value="Return"></td>
            </tr>
            </tbody>
        </table>
    </form>
<?php
